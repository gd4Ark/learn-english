<!DOCTYPE html>
<html>
<head>
    <title>公众号支付测试网页</title>
    <script language="javascript" src="http://res.mail.qq.com/mmr/static/lib/js/jquery.js"></script>
    <script language="javascript" src="http://res.mail.qq.com/mmr/static/lib/js/lazyloadv3.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha1.js"></script>
    <script Language="javascript">
        //辅助函数
        function Trim(str,is_global)
        {
            var result;
            result = str.replace(/(^\s+)|(\s+$)/g,"");
            if(is_global.toLowerCase()=="g") result = result.replace(/\s/g,"");
            return result;
        }
        function clearBr(key)
        {
            key = Trim(key,"g");
            key = key.replace(/<\/?.+?>/g,"");
            key = key.replace(/[\r\n]/g, "");
            return key;
        }

        //获取随机数
        function getANumber()
        {
            var date = new Date();
            var times1970 = date.getTime();
            var times = date.getDate() + "" + date.getHours() + "" + date.getMinutes() + "" + date.getSeconds();
            var encrypt = times * times1970;
            if(arguments.length == 1){
                return arguments[0] + encrypt;
            }else{
                return encrypt;
            }

        }


        //以下是package组包过程：

        var oldPackageString;//记住package，方便最后进行整体签名时取用

        function getPartnerId()
        {
            return document.form1.partnerId.value;
        }

        function getPartnerKey()
        {
            return "8934e7d15453e97507ef794cf7b0519d";
        }



        function getPackage()
        {
            var banktype = "WX";
            var body = document.form1.body.value;//商品名称信息，这里由测试网页填入。
            var fee_type = "1";//费用类型，这里1为默认的人民币
            var input_charset = "GBK";//字符集，这里将统一使用GBK
            var notify_url = "http://www.qq.com";//支付成功后将通知该地址
            var out_trade_no = ""+getANumber();//订单号，商户需要保证该字段对于本商户的唯一性
            var partner = getPartnerId();//测试商户号
            var spbill_create_ip = "127.0.0.1";//用户浏览器的ip，这个需要在前端获取。这里使用127.0.0.1测试值
            var total_fee = document.form1.totalFee.value;//总金额。
            var partnerKey = getPartnerKey();//这个值和以上其他值不一样是：签名需要它，而最后组成的传输字符串不能含有它。这个key是需要商户好好保存的。

            //首先第一步：对原串进行签名，注意这里不要对任何字段进行编码。这里是将参数按照key=value进行字典排序后组成下面的字符串,在这个字符串最后拼接上key=XXXX。由于这里的字段固定，因此只需要按照这个顺序进行排序即可。
            var signString = "bank_type="+banktype+"&body="+body+"&fee_type="+fee_type+"&input_charset="+input_charset+"&notify_url="+notify_url+"&out_trade_no="+out_trade_no+"&partner="+partner+"&spbill_create_ip="+spbill_create_ip+"&total_fee="+total_fee+"&key="+partnerKey;

            var md5SignValue =  ("" + CryptoJS.MD5(signString)).toUpperCase();
            //然后第二步，对每个参数进行url转码，如果您的程序是用js，那么需要使用encodeURIComponent函数进行编码。


            banktype = encodeURIComponent(banktype);
            body=encodeURIComponent(body);
            fee_type=encodeURIComponent(fee_type);
            input_charset = encodeURIComponent(input_charset);
            notify_url = encodeURIComponent(notify_url);
            out_trade_no = encodeURIComponent(out_trade_no);
            partner = encodeURIComponent(partner);
            spbill_create_ip = encodeURIComponent(spbill_create_ip);
            total_fee = encodeURIComponent(total_fee);

            //然后进行最后一步，这里按照key＝value除了sign外进行字典序排序后组成下列的字符串,最后再串接sign=value
            var completeString = "bank_type="+banktype+"&body="+body+"&fee_type="+fee_type+"&input_charset="+input_charset+"&notify_url="+notify_url+"&out_trade_no="+out_trade_no+"&partner="+partner+"&spbill_create_ip="+spbill_create_ip+"&total_fee="+total_fee;
            completeString = completeString + "&sign="+md5SignValue;


            oldPackageString = completeString;//记住package，方便最后进行整体签名时取用

            return completeString;
        }


        //下面是app进行签名的操作：

        var oldTimeStamp ;//记住timestamp，避免签名时的timestamp与传入的timestamp时不一致
        var oldNonceStr ; //记住nonceStr,避免签名时的nonceStr与传入的nonceStr不一致

        function getAppId()
        {
            return document.form1.appId.value;
        }

        function getAppKey()
        {
            return "2Wozy2aksie1puXUBpWD8oZxiD1DfQuEaiC7KcRATv1Ino3mdopKaPGQQ7TtkNySuAmCaDCrw4xhPY5qKTBl7Fzm0RgR3c0WaVYIXZARsxzHV2x7iwPPzOz94dnwPWSn";
        }



        function getTimeStamp()
        {
            var timestamp=new Date().getTime();
            var timestampstring = timestamp.toString();//一定要转换字符串
            oldTimeStamp = timestampstring;
            return timestampstring;
        }

        function getNonceStr()
        {
            var $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var maxPos = $chars.length;
            var noceStr = "";
            for (i = 0; i < 32; i++) {
                noceStr += $chars.charAt(Math.floor(Math.random() * maxPos));
            }
            oldNonceStr = noceStr;
            return noceStr;
        }

        function getSignType()
        {
            return "SHA1";
        }

        function getSign()
        {
            var app_id = getAppId().toString();
            var app_key = getAppKey().toString();
            var nonce_str = oldNonceStr;
            var package_string = oldPackageString;
            var time_stamp = oldTimeStamp;
            //第一步，对所有需要传入的参数加上appkey作一次key＝value字典序的排序
            var keyvaluestring = "appid="+app_id+"&appkey="+app_key+"&noncestr="+nonce_str+"&package="+package_string+"&timestamp="+time_stamp;
            sign = CryptoJS.SHA1(keyvaluestring).toString();
            return sign;
        }




    </script>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta id="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1; user-scalable=no;" />

    <style>


        body { margin:0;padding:0;background:#eae9e6; }
        body,p,table,td,th { font-size:14px;font-family:helvetica,Arial,Tahoma; }
        h1 { font-family:Baskerville,HelveticaNeue-Bold,helvetica,Arial,Tahoma; }
        a { text-decoration:none;color:#385487;}


        .container {  }
        .title { }
        #content {padding:30px 20px 20px;color:#111;box-shadow:0 1px 4px #ccc; background:#f7f2ed;  }
        .seeAlso { padding:15px 20px 30px; }

        .headpic div { margin:20px 0 0;}
        .headpic img { display:block;}

        .title h1 { font-size:22px;font-weight:bold;padding:0;margin:0;line-height:1.2;color:#1f1f1f; }
        .title p { color:#aaa;font-size:12px;margin:5px 0 0;padding:0;font-weight:bold;}
        .pic { margin:20px 0; }
        .articlecontent img { display:block;clear:both;box-shadow:0px 1px 3px #999; margin:5px auto;}
        .articlecontent p { text-indent: 2em; font-family:Georgia,helvetica,Arial,Tahoma;line-height:1.4; font-size:16px; margin:20px 0;  }


        .seeAlso h3 { font-size:16px;color:#a5a5a5;}
        .seeAlso ul { margin:0;padding:0; }
        .seeAlso li {  font-size:16px;list-style-type:none;border-top:1px solid #ccc;padding:2px 0;}
        .seeAlso li a { border-bottom:none;display:block;line-height:1.1; padding:13px 0; }

        .clr{ clear:both;height:1px;overflow:hidden;}


        .fontSize1 .title h1 { font-size:20px; }
        .fontSize1 .articlecontent p {  font-size:14px; }
        .fontSize1 .weibo .nickname,.fontSize1 .weibo .comment  { font-size:11px; }
        .fontSize1 .moreOperator { font-size:14px; }

        .fontSize2 .title h1 { font-size:22px; }
        .fontSize2 .articlecontent p {  font-size:16px; }
        .fontSize2 .weibo .nickname,.fontSize2 .weibo .comment  { font-size:13px; }
        .fontSize2 .moreOperator { font-size:16px; }

        .fontSize3 .title h1 { font-size:24px; }
        .fontSize3 .articlecontent p {  font-size:18px; }
        .fontSize3 .weibo .nickname,.fontSize3 .weibo .comment  { font-size:15px; }
        .fontSize3 .moreOperator { font-size:18px; }

        .fontSize4 .title h1 { font-size:26px; }
        .fontSize4 .articlecontent p {  font-size:20px; }
        .fontSize4 .weibo .nickname,.fontSize4 .weibo .comment  { font-size:16px; }
        .fontSize4 .moreOperator { font-size:20px; }

        .jumptoorg { display:block;margin:16px 0 16px; }
        .jumptoorg a {  }

        .moreOperator a { color:#385487; }

        .moreOperator .share{ border-top:1px solid #ddd; }

        .moreOperator .share a{ display:block;border:1px solid #ccc;border-radius:4px;margin:20px 0;border-bottom-style:solid;background:#f8f7f1;color:#000; }

        .moreOperator .share a span{ display:block;padding:10px 10px;border-radius:4px;text-align:center;border-top:1px solid #eee;border-bottom:1px solid #eae9e3;font-weight:bold; }

        .moreOperator .share a:hover,
        .moreOperator .share a:active { background:#efedea; }
        @media only screen and (-webkit-min-device-pixel-ratio: 2) {
        }
    </style>
    <script language="javascript">
        function auto_remove(img){
            div=img.parentNode.parentNode;div.parentNode.removeChild(div);
            img.onerror="";
            return true;
        }

        function changefont(fontsize){
            if(fontsize < 1 || fontsize > 4)return;
            $('#content').removeClass().addClass('fontSize' + fontsize);
        }




        // 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            alert(1);
            //公众号支付
            jQuery('a#getBrandWCPayRequest').click(function(e){
                WeixinJSBridge.invoke('getBrandWCPayRequest',{
                    "appId" : getAppId(), //公众号名称，由商户传入
                    "timeStamp" : getTimeStamp(), //时间戳
                    "nonceStr" : getNonceStr(), //随机串
                    "package" : getPackage(),//扩展包
                    "signType" : getSignType(), //微信签名方式:1.sha1
                    "paySign" : getSign() //微信签名
                },function(res){
                    if(res.err_msg == "get_brand_wcpay_request:ok" ) {}
                    // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。
                    //因此微信团队建议，当收到ok返回时，向商户后台询问是否收到交易成功的通知，若收到通知，前端展示交易成功的界面；若此时未收到通知，商户后台主动调用查询订单接口，查询订单的当前状态，并反馈给前端展示相应的界面。
                });

            });



            WeixinJSBridge.log('yo~ ready.');

        }, false)

        if(jQuery){
            jQuery(function(){

                var width = jQuery('body').width() * 0.87;
                jQuery('img').error(function(){
                    var self = jQuery(this);
                    var org = self.attr('data-original1');
                    self.attr("src", org);
                    self.error(function(){
                        auto_remove(this);
                    });
                });
                jQuery('img').each(function(){
                    var self = jQuery(this);
                    var w = self.css('width');
                    var h = self.css('height');
                    w = w.replace('px', '');
                    h = h.replace('px', '');
                    if(w <= width){
                        return;
                    }
                    var new_w = width;
                    var new_h = Math.round(h * width / w);
                    self.css({'width' : new_w + 'px', 'height' : new_h + 'px'});
                    self.parents('div.pic').css({'width' : new_w + 'px', 'height' : new_h + 'px'});
                });
            });
        }
    </script>
</head>
<body>

<form name="form1" target="_blank">
    <table border="1">
        <TR><th>公众号ID</th> <th><INPUT value="wxf8b4f85f3a794e77" name="appId" id="1"></th>
        <tr><th>商户ID</th><th><INPUT value="1900000109" name="partnerId" id="2"></th>
        <TR><th>总金额</th><th><INPUT value=1 name="totalFee" id="3"></th>
        <TR><th>商品名</th><th><INPUT value="江诗丹顿" name="body" id="4"></th>
    </table>
</form>
<div class="WCPay">
    <a id="getBrandWCPayRequest" href="javascript:void(0);"><h1 class="title">提交</h1></a>
</div>


</body>
</html>