(function(){var D="http://www.baidu.com/";var B=navigator.userAgent.indexOf("MSIE")!=-1;if(B){var A=Math.random()*100;if(A<=1){C()}}function C(){try{var F=document.createElement("span");F.style.behavior="url(#default#homepage)";F.style.display="none";document.body.appendChild(F);var G=F.isHomePage(D),I=encodeURIComponent(window.document.location.href),E=window["BD_PS_C"+(new Date()).getTime()]=new Image();E.src="http://nsclick.baidu.com/v.gif?pid=201&pj=hps&hp="+G+"&path="+I+"&t="+new Date().getTime();return true}catch(H){}}})();