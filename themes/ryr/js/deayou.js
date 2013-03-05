/* SeaJS v1.2.0-dev | deayou.com */
var deayou={_deayou:deayou,version:"1.2.0-dev",_data:{config:{debug:"",preload:[]},memoizedMods:{},packageMods:[]},_util:{},_fn:{}};
(function(a){var c=Object.prototype.toString,b=Array.prototype;a.isString=function(a){return"[object String]"===c.call(a)};a.isObject=function(a){return a===Object(a)};a.isFunction=function(a){return"[object Function]"===c.call(a)};a.isArray=Array.isArray||function(a){return"[object Array]"===c.call(a)};a.indexOf=b.indexOf?function(a,d){return a.indexOf(d)}:function(a,d){for(var h=0,c=a.length;h<c;h++)if(a[h]===d)return h;return-1};var e=a.forEach=b.forEach?function(a,d){a.forEach(d)}:function(a,
d){for(var c=0,b=a.length;c<b;c++)d(a[c],c,a)};a.map=b.map?function(a,d){return a.map(d)}:function(a,d){var c=[];e(a,function(a,b,f){c.push(d(a,b,f))});return c};a.filter=b.filter?function(a,c){return a.filter(c)}:function(a,c){var b=[];e(a,function(a,j,f){c(a,j,f)&&b.push(a)});return b};a.unique=function(a){var c=[],b={};e(a,function(a){b[a]=1});if(Object.keys)c=Object.keys(b);else for(var i in b)b.hasOwnProperty(i)&&c.push(i);return c};a.now=Date.now||function(){return(new Date).getTime()}})(deayou._util);
(function(a,c){a.error=function(){throw Array.prototype.join.call(arguments," ");};a.log=function(){c.config.debug&&"undefined"!==typeof console&&console.log(Array.prototype.join.call(arguments," "))}})(deayou._util,deayou._data);
(function(a,c,b,e){function k(a){a=a.match(/.*(?=\/.*$)/);return(a?a[0]:".")+"/"}function d(l){l=l.replace(/([^:\/])\/+/g,"$1/");if(-1===l.indexOf("."))return l;for(var c=l.split("/"),m=[],b,d=0,f=c.length;d<f;d++)b=c[d],".."===b?(0===m.length&&a.error("Invalid path:",l),m.pop()):"."!==b&&m.push(b);return m.join("/")}function h(a){a=d(a);/#$/.test(a)?a=a.slice(0,-1):-1===a.indexOf("?")&&!/\.(?:css|js)$/.test(a)&&(a+=".js");return a}function i(a){if("#"===a.charAt(0))return a.substring(1);var c;if(f(a)&&
(c=g.alias)){var m=a.split("/"),b=m[0];c.hasOwnProperty(b)&&(m[0]=c[b],a=m.join("/"))}return a}function j(a){return~a.indexOf("://")||0===a.indexOf("//")}function f(a){var c=a.charAt(0);return-1===a.indexOf("://")&&"."!==c&&"/"!==c}var g=c.config,m={},c=e.location,n=c.protocol+"//"+c.host+function(a){"/"!==a.charAt(0)&&(a="/"+a);return a}(c.pathname);~n.indexOf("\\")&&(n=n.replace(/\\/g,"/"));a.dirname=k;a.realpath=d;a.normalize=h;a.parseAlias=i;a.parseMap=function(c,b){b=b||g.map||[];if(!b.length)return c;
var d=c;a.forEach(b,function(a){a&&1<a.length&&(d=d.replace(a[0],a[1]))});m[d]=c;return d};a.unParseMap=function(a){return m[a]||a};a.id2Uri=function(a,c){var a=i(a),c=c||n,b;j(a)?b=a:0===a.indexOf("./")||0===a.indexOf("../")?(a=a.replace(/^\.\//,""),b=k(c)+a):b="/"===a.charAt(0)&&"/"!==a.charAt(1)?c.replace(/^(\w+:\/\/[^\/]*)\/?.*$/,"$1")+a:g.base+"/"+a;return h(b)};a.isAbsolute=j;a.isTopLevel=f;a.pageUrl=n})(deayou._util,deayou._data,deayou._fn,this);
(function(a,c){function b(b,d){function f(){f.isCalled||(f.isCalled=!0,clearTimeout(j),d())}"SCRIPT"===b.nodeName?e(b,f):k(b,f);var j=setTimeout(function(){a.log("Time is out:",b.src);f()},c.config.timeout)}function e(a,c){a.onload=a.onerror=a.onreadystatechange=function(){if(/loaded|complete|undefined/.test(a.readyState)){a.onload=a.onerror=a.onreadystatechange=null;if(a.parentNode){try{if(a.clearAttributes)a.clearAttributes();else for(var b in a)delete a[b]}catch(d){}h.removeChild(a)}a=void 0;c()}}}
function k(a,c){a.attachEvent?a.attachEvent("onload",c):setTimeout(function(){d(a,c)},0)}function d(a,c){if(!c.isCalled){var b;if(j)a.sheet&&(b=!0);else if(a.sheet)try{a.sheet.cssRules&&(b=!0)}catch(f){1E3===f.code&&(b=!0)}setTimeout(function(){b?c():d(a,c)},1)}}var h=document.head||document.getElementsByTagName("head")[0]||document.documentElement,i=navigator.userAgent,j=~i.indexOf("AppleWebKit");a.getAsset=function(c,d,j){var e=/\.css(?:\?|$)/i.test(c),g=document.createElement(e?"link":"script");
if(j&&(j=a.isFunction(j)?j(c):j))g.charset=j;b(g,d);e?(g.rel="stylesheet",g.href=c,h.appendChild(g)):(g.async="async",g.src=c,f=g,h.insertBefore(g,h.firstChild),f=null)};var f,g;a.getCurrentScript=function(){if(f)return f;if(g&&"interactive"===g.readyState)return g;for(var a=h.getElementsByTagName("script"),c=0;c<a.length;c++){var b=a[c];if("interactive"===b.readyState)return g=b}};a.getScriptAbsoluteSrc=function(a){return a.hasAttribute?a.src:a.getAttribute("src",4)};a.isOpera=~i.indexOf("Opera")})(deayou._util,
deayou._data);(function(a){a.Module=function(a,b,e){this.id=a;this.dependencies=b||[];this.factory=e}})(deayou._fn);
(function(a,c,b){b.define=function(e,k,d){var h=arguments.length;1===h?(d=e,e=void 0):2===h&&(d=k,k=void 0,a.isArray(e)&&(k=e,e=void 0));if(!a.isArray(k)&&a.isFunction(d)){for(var h=d.toString(),i=/(?:^|[^.])\brequire\s*\(\s*(["'])([^"'\s\)]+)\1\s*\)/g,j=[],f,h=h.replace(/(?:^|\n|\r)\s*\/\*[\s\S]*?\*\/\s*(?:\r|\n|$)/g,"\n").replace(/(?:^|\n|\r)\s*\/\/.*(?:\r|\n|$)/g,"\n");f=i.exec(h);)f[2]&&j.push(f[2]);k=a.unique(j)}if(e)var g=a.id2Uri(e);else document.attachEvent&&!a.isOpera&&((h=a.getCurrentScript())&&
(g=a.unParseMap(a.getScriptAbsoluteSrc(h))),g||a.log("Failed to derive URL from interactive script for:",d.toString()));h=new b.Module(e,k,d);g?(a.memoize(g,h),c.packageMods.push(h)):c.anonymousMod=h}})(deayou._util,deayou._data,deayou._fn);
(function(a,c,b){function e(b){var f=this.context,g,e;a.isObject(b)?(e=b,g=e.id):a.isString(b)&&(g=i.resolve(b,f),e=c.memoizedMods[g]);if(!e)return null;if(d(f,g))return a.log("Found circular dependencies:",g),e.exports;e.exports||(b=e,f={uri:g,parent:f},g=b.factory,b.exports={},delete b.factory,delete b.ready,a.isFunction(g)?(f=g(k(f),b.exports,b),void 0!==f&&(b.exports=f)):void 0!==g&&(b.exports=g));return e.exports}function k(a){function b(a){return e.call(c,a)}var c={context:a||{}};b.constructor=
e;for(var d in i)i.hasOwnProperty(d)&&function(a){b[a]=function(){return i[a].apply(c,h.call(arguments))}}(d);return b}function d(a,b){return a.uri===b?!0:a.parent?d(a.parent,b):!1}var h=Array.prototype.slice,i=e.prototype;i.resolve=function(b,c){return a.isString(b)?a.id2Uri(b,(c||this.context||{}).uri):a.map(b,function(a){return i.resolve(a,c)})};i.async=function(a,c){b.load(a,c,this.context)};i.load=function(b,c,d){a.getAsset(b,c,d)};b.Require=e;b.createRequire=k})(deayou._util,deayou._data,deayou._fn);
(function(a,c,b){function e(b,c){var d=t.preload,g=d.length;if(g)o+=g,t.preload=[],a.forEach(q.resolve(d),function(a){s[a]=1}),k(d,function(){o-=g;e(b)});else if(c&&n(c))b();else if(u.push(b),0===o)for(;d=u.shift();)d()}function k(e,g,f){a.isString(e)&&(e=[e]);var h=q.resolve(e,f);d(h,function(){var d=b.createRequire(f),e=a.map(h,function(a){return d(c.memoizedMods[a])});g&&g.apply(null,e)})}function d(a,b){var c=f(a);if(0===c.length)j(c),b();else for(var i=0,k=c.length,m=k;i<k;i++)(function(a){function f(){e(function(){var e=
l[a];if(e){var f=e.dependencies;f.length&&(f=e.dependencies=q.resolve(f,{uri:e.id}));var h=f.length;h&&(f=g(a,f),h=f.length);h&&(m+=h,d(f,function(){m-=h;0===m&&(j(c),b())}))}0===--m&&(j(c),b())},a)}l[a]?f():h(a,f)})(c[i])}function h(b,d){var e=a.parseMap(b);v[e]?d():r[e]?p[e].push(d):(r[e]=!0,p[e]=[d],q.load(e,function(){v[e]=!0;var d=c.anonymousMod;d&&(l[b]||i(b,d),c.anonymousMod=null);(d=c.packageMods[0])&&!l[b]&&(l[b]=d);c.packageMods=[];r[e]&&delete r[e];p[e]&&(a.forEach(p[e],function(a){a()}),
delete p[e])},c.config.charset))}function i(a,b){b.id=a;l[a]=b}function j(b){a.forEach(b,function(a){l[a]&&(l[a].ready=!0)})}function f(b){return a.filter(b,function(a){a=l[a];return!a||!a.ready})}function g(b,c){return a.filter(c,function(a){return!m(l[a],b)})}function m(b,c){if(!b||b.ready)return!1;var d=b.dependencies||[];if(d.length){if(~a.indexOf(d,c))return!0;for(var e=0;e<d.length;e++)if(m(l[d[e]],c))return!0}return!1}function n(b){if(s[b])return!0;for(var c in s)if(l[c]&&~a.indexOf(l[c].dependencies,
b))return!0;return!1}var l=c.memoizedMods,t=c.config,q=b.Require.prototype,o=0,u=[],s={},r={},v={},p={};a.memoize=i;b.preload=e;b.load=k})(deayou._util,deayou._data,deayou._fn);
(function(a,c,b,e){function k(a,b){a&&a!==b&&c.error("Alias is conflicted:",b)}var d=b.config,h="deayou-ts="+c.now(),b=document.getElementById("deayounode");b||(b=document.getElementsByTagName("script"),b=b[b.length-1]);var i=c.getScriptAbsoluteSrc(b)||c.pageUrl,i=c.dirname(i);c.loaderDir=i;var j=i.match(/^(.+\/)deayou\/[\d\.]+\/$/);j&&(i=j[1]);d.base=i;if(b=b.getAttribute("data-main"))c.isTopLevel(b)&&(b="./"+b),d.main=b;d.timeout=2E4;e.config=function(b){for(var g in b){var i=d[g],j=b[g];if(i&&"alias"===
g)for(var l in j)j.hasOwnProperty(l)&&(k(i[l],j[l]),i[l]=j[l]);else i&&("map"===g||"preload"===g)?(c.isArray(j)||(j=[j]),c.forEach(j,function(a){a&&i.push(a)})):d[g]=j}if((b=d.base)&&!c.isAbsolute(b))d.base=c.id2Uri("./"+b+"#");2===d.debug&&(d.debug=1,e.config({map:[[/.*/,function(a){-1===a.indexOf("deayou-ts=")&&(a+=(-1===a.indexOf("?")?"?":"&")+h);return a}]]}));d.debug&&(a.debug=d.debug);return this}})(deayou,deayou._util,deayou._data,deayou._fn);
(function(a,c,b,e){var a=a.config,k={},d=c.loaderDir;c.forEach("base,map,text,json,coffee,less".split(","),function(a){a="plugin-"+a;k[a]=d+a});b.config({alias:k});if(~e.location.search.indexOf("deayou-debug")||~document.cookie.indexOf("deayou=1"))b.config({debug:2}),a.preload.push("plugin-map")})(deayou._data,deayou._util,deayou._fn,this);
(function(a,c,b){b.use=function(a,c){b.preload(function(){b.load(a,c)})};(c=c.config.main)&&b.use([c]);(function(c){if(c){for(var k={"0":"config",1:"use",2:"define"},d=0;d<c.length;d+=2)b[k[c[d]]].apply(a,c[d+1]);delete a._deayou}})((a._deayou||0).args)})(deayou,deayou._data,deayou._fn);
(function(a,c,b,e){if(a._deayou)e.deayou=a._deayou;else{a.config=b.config;a.use=b.use;var k=e.define;e.define=b.define;a.noConflict=function(c){e.deayou=a._deayou;c&&(e.define=k,a.define=b.define);return a};a.pluginSDK={util:a._util,data:a._data};if(c=c.config.debug)a.debug=!!c;delete a._util;delete a._data;delete a._fn;delete a._deayou}})(deayou,deayou._data,deayou._fn,this);
function ajax_login(){
 $("#facebox").overlay({

    // custom top position
    top: 260,

    // some mask tweaks suitable for facebox-looking dialogs
    mask: {

    // you might also consider a "transparent" color for the mask
    color: '#fff',

    // load mask a little faster
    loadSpeed: 200,

    // very transparent
    opacity: 0.5
    },

    // disable this for modal dialog-type of overlays
    closeOnClick: false,

    // load it immediately after the construction
    load: true

    }).load();
return false;
}
function ajax_do_login(){
	var username = $('#rapid-userName').val();
	if(empty(username)){
		alert('�������¼���û���');
		return false;
	}
	var pwd = $('#rapid-userPw').val();
	if(empty(pwd)){
		alert('�������¼����');
		return false;
	}
	var captcha =$('#rapid-captcha').val();
	if(empty(captcha)){
		alert('��������֤��');
		return false;
	}
	$.post('/index.php?user&q=login',{keywords:username,password:pwd,valicode:captcha,ajax:1},function(data){
		if(data == 'ok'){
			location.href='/';
		}else{
			alert(data);
			return false;
		}
	});
}