;
(function ($) {
    "use strict";

    $(function () {
        var TOUCH_EVENT = checkTouchEventType(),
            zoi_button = $("#zoi_button");

        // ボタンは初期表示は非表示なので、表示させてあげる。
        zoi_button.show();

        // 音声ファイルを定義
        $.ionSound({
            sounds: [
                {
                    name: "zoiko"
                }
            ],
            volume: 0.6,
            path: "sounds/",
            preload: true,
            multiplay: true
        });

        // カウントはタイマーで随時更新させる
        setInterval(function () {
            zoiAjax({"mode": "load"});
        }, 2000);

        // 以下イベント処理
        // ボタンクリック時の処理
        zoi_button.on(TOUCH_EVENT, function () {
            // がんばるぞいカウントの加算と取得
            zoiAjax({"mode": "add"});

            // 音声を鳴らす
            $.ionSound.play("zoiko");
        });
    });

    /**
     * がんばるぞいカウント取得
     *
     * @param Associative Array postData
     * {"mode":"load"} の場合はがんばるぞいカウントを取得する
     * {"mode":"add"} の場合はがんばるぞいカウントを加算して取得する
     * @return void 各カウント用エレメントに値を入れ込む。副作用が在る実装は…ん〜仕方ないね。
     */
    function zoiAjax(postData) {
        var zoi_count_total = $("#zoi_count_total"),
            zoi_count_today = $("#zoi_count_today"),
            zoi_count_yesterday = $("#zoi_count_yesterday"),
            zoi_count_today_your = $("#zoi_count_today_your"),
            zoi_upper_limited = $("#zoi_upper_limited");

        $.ajax({
            type: "POST",
            url: "./zoi.php",
            data: postData,
            cache: false,
            async: false,
            dataType: "json"
        }).done(function (result) {
            zoi_count_total.text(result["total"]);
            zoi_count_today.text(result["today"]);
            zoi_count_yesterday.text(result["yesterday"]);
            zoi_count_today_your.text(result["today_your"]);
            if (result["upper_limited"] === true) {
                zoi_upper_limited.show();
            }
        });
    }

    /**
     * touchend イベントの存在チェック
     *
     * @return string "touchend" or "click"
     */
    function checkTouchEventType() {
        if ("ontouchend" in window) {
            return "touchend";
        } else {
            return "click";
        }
    }

})(jQuery);

