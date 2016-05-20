<?php
date_default_timezone_set('Asia/Tokyo');
require_once __DIR__ . "/config.php";

class ganbaruzoiDateBase
{
    private $pdo;
    private $errCon = false;

    public function ganbaruzoiDateBase()
    {
        try {
            $this->pdo = new PDO(
                DBSN,
                DB_USER,
                DB_PASS,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                )
            );
        } catch (PDOException $e) {
            $this->errCon = true;
        }
    }

    public function getTotalCount()
    {
        if ($this->errCon) return 0;
        $stmt = $this->pdo->prepare("SELECT SUM(count) AS total FROM dtb_zoi_count;");
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$count["total"];
    }

    public function getTodayCount()
    {
        if ($this->errCon) return 0;
        $stmt = $this->pdo->prepare("SELECT SUM(count) AS today FROM dtb_zoi_count WHERE date = ?;");
        $stmt->bindValue(1, date("Y-m-d"));
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$count["today"];
    }

    public function getYesterdayCount()
    {
        if ($this->errCon) return 0;
        $stmt = $this->pdo->prepare("SELECT SUM(count) AS today FROM dtb_zoi_count WHERE date = ?;");
        $stmt->bindValue(1, date('Y-m-d', strtotime('-1 day')));
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)$count["today"];
    }

    public function existToday()
    {
        if ($this->errCon) return false;
        $stmt = $this->pdo->prepare("SELECT EXISTS(SELECT date FROM dtb_zoi_count WHERE date = ?) AS exist;");
        $stmt->bindValue(1, date("Y-m-d"));
        $stmt->execute();
        return !in_array(0, $stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function getIpCount()
    {
        if ($this->errCon) return false;

        $where = "ip = ? AND ? < timestamp AND timestamp < ?";
        $stmt = $this->pdo->prepare("SELECT COUNT(ip) AS ip_count FROM dtb_click_user WHERE {$where}");
        $stmt->bindValue(1, $_SERVER["REMOTE_ADDR"]);
        $stmt->bindValue(2, date("Y-m-d") . " 00:00:00");
        $stmt->bindValue(3, date('Y-m-d', strtotime('+1 day')) . " 00:00:00");
        $stmt->execute();
        $count = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$count["ip_count"];
    }

    public function addCount()
    {
        if ($this->errCon) return false;

        // トランザクション処理を開始
        $this->pdo->beginTransaction();

        try {
            if ($this->existToday()) {
                $stmt = $this->pdo->prepare('UPDATE dtb_zoi_count SET count = count + ? WHERE date = ?;');
                $stmt->bindValue(1, 1) ;
                $stmt->bindValue(2, date("Y-m-d"));
                $stmt->execute();
            } else {
                $stmt = $this->pdo->prepare('INSERT INTO dtb_zoi_count(date, count) VALUES(?,?);');
                $stmt->bindValue(1, date("Y-m-d"));
                $stmt->bindValue(2, 1);
                $stmt->execute();
            }

            $stmt = $this->pdo->prepare('INSERT INTO dtb_click_user(ip) VALUES(?);');
            $stmt->bindValue(1, $_SERVER["REMOTE_ADDR"]);
            $stmt->execute();

            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
}