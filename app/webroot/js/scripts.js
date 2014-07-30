window.onload = function(){
	document.querySelector("#myCarousel").style.opacity = 1;
	document.querySelector("#myCarousel img").setAttribute("style","opacity:1; -webkit-transform: scale(1);-ms-transform: scale(1);-moz-transform: scale(1);-o-transform: scale(1);transform: scale(1);");
	setTimeout(function(){
		document.querySelector("#um").setAttribute("style","opacity:1;-moz-transition:all 0.8s ease-out;-ms-transition:all 0.8s ease-out;-webkit-transition: all  0.8s ease-out;-o-transition: all  0.8s ease-out;transition: all  0.8s ease-out; -webkit-transform: translateX(0);-moz-transform: translateX(0);-ms-transform: translateX(0);-o-transform: translateX(0);transform: translateX(0);")
		document.querySelector("#dois").setAttribute("style","opacity:1;-moz-transition:all 0.8s ease-out;-ms-transition:all 0.8s ease-out;-webkit-transition: all  0.8s ease-out;-o-transition: all  0.8s ease-out;transition: all  0.8s ease-out; -webkit-transform: translateX(0);-moz-transform: translateX(0);-ms-transform: translateX(0);-o-transform: translateX(0);transform: translateX(0);")
		document.querySelector("#tres").setAttribute("style","opacity:1;-moz-transition:all 0.8s ease-out;-ms-transition:all 0.8s ease-out;-webkit-transition: all  0.8s ease-out;-o-transition: all  0.8s ease-out;transition: all  0.8s ease-out; -webkit-transform: translateY(0);-moz-transform: translateY(0);-ms-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);")
		
		setTimeout(function(){
			document.querySelector("#botao").setAttribute("style","opacity:1;-moz-transition:all 0.8s ease-out;-ms-transition:all 0.8s ease-out;-webkit-transition: all  0.8s ease-out;-o-transition: all  0.8s ease-out;transition: all  0.8s ease-out; -webkit-transform: scale(1);-moz-transform: scale(1);-ms-transform: scale(1);-o-transform: scale(1);transform: scale(1);")
			document.querySelector("#botao").setAttribute("style","opacity:1; -webkit-animation: pulseSlow infinite alternate 1s ease-in-out;-o-animation: pulseSlow infinite alternate 1s ease-in-out;-moz-animation: pulseSlow infinite alternate 1s ease-in-out;-ms-animation: pulseSlow infinite alternate 1s ease-in-out;animation: pulseSlow infinite alternate 1s ease-in-out;");
		},500);
	},500);
	
}

document.querySelector("#botao").addEventListener("click",function(){
	document.querySelector(".marketing").setAttribute("style","width:100%;top:0;");
	setTimeout(function(){
		document.querySelector(".form-horizontal").style.opacity = 1;

		setTimeout(function(){
			document.querySelector("#fechar-um").setAttribute("style","-webkit-transform:rotateZ(227deg);-moz-transform:rotateZ(227deg);-ms-transform:rotateZ(227deg);-o-transform:rotateZ(227deg);transform:rotateZ(227deg)");
			document.querySelector("#fechar-dois").setAttribute("style","-webkit-transform:rotateZ(-227deg);-moz-transform:rotateZ(-227deg);-ms-transform:rotateZ(-227deg);-o-transform:rotateZ(-227deg);transform:rotateZ(-227deg)");
		},500)
	},500);
},true);

document.querySelector("#close").addEventListener("click",function(){
	document.querySelector(".form-horizontal").style.opacity = 0;

	setTimeout(function(){
		document.querySelector("#fechar-um").setAttribute("style","-webkit-transform:rotateZ(0);-moz-transform:rotateZ(0);-ms-transform:rotateZ(0);-o-transform:rotateZ(0);transform:rotateZ(0)");
		document.querySelector("#fechar-dois").setAttribute("style","-webkit-transform:rotateZ(0);-moz-transform:rotateZ(0);-ms-transform:rotateZ(0);-o-transform:rotateZ(0);transform:rotateZ(0)");
		
			document.querySelector(".marketing").setAttribute("style","width:0;top:100%;");

	},500)
});
