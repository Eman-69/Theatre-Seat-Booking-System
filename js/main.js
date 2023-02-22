/*function clickindicator(num)
{
	var ini=0;
	for (var i =0; i <5; i++) {
		if(i==num)
		{
			document.getElementbyId('banner').querySelectorAll("button")[i].setAttribute("class","active");
			ini=i;
		}
		document.getElementbyId('banner').querySelectorAll("button")[i].setAttribute("class"," ");

	}
}*/
window.addEventListener('load',function()
{
	setTimeout("document.getElementById('preload').style.display='none';",1000);
});
function loginfxn(){
	document.querySelector(".popup").classList.add("active");
}
function loginclosefxn(){
	document.querySelector(".popup").classList.remove("active");
}
function wrongcred(){
	document.querySelector(".wrongcred").innerHTML="Wrong Credentials!";
	setTimeout("document.querySelector('.wrongcred').innerHTML='';",2000);
}
function forgotpasswrongfxn()
{
	document.querySelector(".forgotpasswrong").innerHTML="Doesnt match!";
	setTimeout("document.querySelector('.forgotpasswrong').innerHTML='';",2000);
}
/*function scrollfxn()
{
	if(document.body.scrollTop>100||document.documentElement.scrollTop>100)
	{
		document.getElementById("navbar").className="active";
		//document.querySelector("#signoutform").classList.add("scrollnav");
		//document.querySelector("navbar-span").classList.add("scrollnav");
	}
	else if(document.body.scrollTop<100)
	{
		document.querySelector("#navbar").classList.remove("active");
		//document.querySelector("#signoutform").classList.add("scrollnav");
		//document.querySelector("navbar-span").classList.add("scrollnav");
	}
}*/



function bookaticket()
{
	document.getElementsByClassName("bookaticket")[0].setAttribute("class","bookaticket active");
}
function bookaticketclose() {
	document.querySelector(".bookaticket").classList.remove("active");
}
/*function moviefxn(mid,mname)
{
	console.log(mid);
	window.location.href = "../booking.html";
	document.getElementsById("movie").querySelector(h1).innerHtml(mname);
}
*/