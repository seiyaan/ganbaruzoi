<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="description" content="<!--{$smarty.const.SITE_DISCRIPTION}-->">
    <meta name="keywords" content="<!--{$smarty.const.SITE_KEYWORDS}-->">
    <meta name="author" content="<!--{$smarty.const.AUTHOR_NAME}-->">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <link rel="shortcut icon" href="./images/favicon.png">
    <link rel="stylesheet" href="./css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="./js/ion.sound.min.js"></script>
    <script type="text/javascript" src="./js/zoi.js"></script>
    <!--{* ▼Google Analytics*}-->
    <script type="text/javascript" src="./js/ga.js"></script>
    <!--{* ▲Google Analytics*}-->

    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="//ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->

    <title><!--{$smarty.const.SITE_TITLE}--></title>
</head>
<body>

<!--{* ▼Facebookいいねボタン用 *}-->
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/ja_KS/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!--{* ▲Facebookいいねボタン用 *}-->


<header>
    <h1>連打して元気を出そう『今日も一日がんばるぞい！ボタン』</h1>
</header>

<main id="zoi">
    <section id="zoi_button" unselectable="on">
        <h1>今日も一日がんばるぞい！</h1>

        <h2>Kyou mo 1-nichi Ganbaru Zoi!</h2>
    </section>

    <section id="zoi_count">
        <p>
            <span id="zoi_cross">×</span><span id="zoi_count_total"><!--{$zoiCount.total|default:0}--></span>ぞい！
        </p>

        <p>
            今日<span id="zoi_count_today"><!--{$zoiCount.today|default:0}--></span>ぞい！昨日<span id="zoi_count_yesterday"><!--{$zoiCount.yesterday|default:0}--></span>ぞい！<br>
            今日のあなた<span id="zoi_count_today_your"><!--{$zoiCount.today_your|default:0}--></span>ぞい！
        </p>

        <p id="zoi_upper_limited">
            1日に押せる上限値を越えてしまったぞい…<br>
            また明日も押しに来るぞい…！
        </p>

        <p id="zoi_description">
            今日も一日がんばりたい時は押してみよう！<br>
            元ネタは漫画『NEW GAME!』の涼風青葉ちゃんのセリフです。<br>
            どくじた様からキャラクターボイスのご提供を頂きました、ありがとうございます！
        </p>
    </section>

    <ul class="sns sns_horizon">
        <li class="sns_horizon--facebook">
            <div class="fb-like" data-href="<!--{$smaty.const.SITE_URL}-->" data-width="69" data-layout="box_count"
                 data-action="like" data-show-faces="false" data-share="false"></div>
        </li>
        <li class="sns_horizon--twitter">
            <iframe style="position: static; visibility: visible; width: 67px; height: 61px;" data-twttr-rendered="true"
                    title="Twitter Tweet Button"
                    class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-vertical"
                    src="http://platform.twitter.com/widgets/tweet_button.12a0910b1b8c2c2ad25af3fcd05d55c1.ja.html#_=1431151810791&amp;count=vertical&amp;dnt=false&amp;id=twitter-widget-0&amp;lang=ja&amp;original_referer=<!--{$smaty.const.SITE_URL}-->&amp;size=m&amp;text=<!--{$smarty.const.TWITTER_DISCRIPTION}-->&amp;url=<!--{$smarty.const.SITE_URL}-->&amp;hashtags=<!--{$smarty.const.HASH_TAG}-->"
                    allowtransparency="true" scrolling="no" id="twitter-widget-0" frameborder="0"></iframe>
        </li>
        <li class="sns_horizon--hatebu">
            <a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button"
               data-hatena-bookmark-layout="vertical-balloon" data-hatena-bookmark-lang="ja"
               title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png"
                                                 alt="このエントリーをはてなブックマークに追加" width="20" height="20"
                                                 style="border: none;"/></a>
            <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8"
                    async="async"></script>
        </li>
    </ul>

    <p>
    	GitHub : <a href="https://github.com/seiyaan/ganbaruzoi" target="_blank" title="ソースコード">https://github.com/seiyaan/ganbaruzoi</a>
    </p>


</main>


<footer>
    (C) 2015
    <!--{$smarty.const.AUTHOR_NAME}--> /
    Voice <!--{$smarty.const.VOICE_ACTOR_NAME}-->
</footer>

</body>
</html>
