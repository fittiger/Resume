<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <style>
        * {
    margin: 0;
    padding: 0;
}

        li {
    list-style: none;
        }

        body {
    font-size: 14px;
            font-family: "Microsoft yahei";
        }

        .clear {
    zoom: 1;
}

        .clear:after {
    content: "";
    display: block;
    clear: both;
    height: 0;
}

        .content {
    padding: 5px 0;
            position: relative;
            border: 1px solid #000000;
            width: 600px;
            margin: 0 auto;
        }

        .t {
    width: 0;
    height: 0;
    font-size: 0;
            position: absolute;
            border-width: 20px;
            top: 50%;
            margin-top: -20px;
            cursor: pointer;
        }

        .left {
    border-style: dashed solid dashed dashed;
            left: 0;
        }

        .right {
    border-style: dashed dashed dashed solid;
            right: 0;
        }

        .wrap {
    overflow: hidden;
    position: relative;
    margin: 0 auto;
            border: 1px solid #000000;
            width: 420px;
            height: 84px;
        }

        .ul1 {
    position: absolute;
}

        .ul1 li {
    float: left;
    padding: 10px 5px;
        }

        .black_l {
    border-color: transparent #000000 transparent transparent;
        }

        .gray_l {
    border-color: transparent #ddd transparent transparent;
        }

        .black_r {
    border-color: transparent transparent transparent #000000;
        }

        .gray_r {
    border-color: transparent transparent transparent #ddd;
        }

        img {
    width: 60px;
            height: 60px;
        }
    </style>
</head>

<body>
<div id="demo" class="content">
    <div class="t left black_l">
    </div>
    <div class="wrap">
        <ul id="ul1" class="ul1 clear">
            <li><a href=""><img src="images/1.png" alt="图片1"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片2"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片3"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片4"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片5"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片6"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片7"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片8"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片9"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片10"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片11"/></a></li>
            <li><a href=""><img src="images/1.png" alt="图片12"/></a></li>
        </ul>
    </div>
    <div class="t right black_r">
    </div>
</div>
</body>
<script>
    function cancel(obj, ev, fn) {
//        绑定多个事件，判断是ie还是其他浏览器。
        if (obj.attachEvent) {
            obj.attachEvent('on' + ev, function () {
                return fn.call(obj)
            })
        }
        else {
            obj.addEventListener(ev, fn, false)
        }
    }
    function getByClass(oParent, sClass) {
        var aEl = oParent.getElementsByTagName('*');
        var aResult = [];
        var re = new RegExp('\\b' + sClass + '\\b');
        for (var i = 0; i < aEl.length; i++) {
            if (re.test(aEl[i].className)) {
                aResult.push(aEl[i])
            }
        }
        return aResult;
    }
</script>
<script>
(function () {
    var oUl = document.getElementById('ul1');
    var aLi = oUl.getElementsByTagName('li');
    var oDemo = document.getElementById('demo');
    var aBtn = getByClass(oDemo, 't');
    var now = 0;
    var deep_line = -(aLi.length - 6) * aLi[0].offsetWidth;
    var move_one = aLi[0].offsetWidth;
    oUl.style.width = aLi.length * aLi[0].offsetWidth + "px";
    function gray() {
        if (oUl.offsetLeft <= deep_line) {
            aBtn[1].className = "t right gray_r";
        }
        else {
            aBtn[1].className = "t right black_r";
        }
        if (oUl.offsetLeft >= 0) {
            aBtn[0].className = "t left gray_l";
        }
        else {
            aBtn[0].className = "t left black_l";
        }
    }

    gray();

    function getLeft(l) {
        if (l) {
            var dis = -1;
            if (oUl.offsetLeft <= deep_line) {
                oUl.style.left = deep_line + "px";
            } else {
                oUl.style.left = oUl.offsetLeft + dis * move_one + "px";
            }
        }//0
        else {
            var dis = 1;
            if (oUl.offsetLeft >= 0) {
                oUl.style.left = 0 + "px";
                console.log(1)
                } else {
                oUl.style.left = oUl.offsetLeft + dis * move_one + "px";
            }
        }//1
        gray();
    }

    function mousewheel(ev) {
        var choose = ev || enent;
        var True = true;
        True = choose.wheelDelta ? choose.wheelDelta < 0 : choose.detail > 0;
        getLeft(True);
        if (choose.preventDefault) {
            choose.preventDefault();
        }
        return false;
    }

    for (var i = 0; i < aBtn.length; i++) {
        aBtn[i].index = i;
        aBtn[i].onclick = function () {
            getLeft(this.index);
        }
        }

        cancel(oDemo, 'mousewheel', mousewheel);
        cancel(oDemo, 'DOMMouseScroll', mousewheel);
    })
    ()
    </script>
</html>