var el = document.getElementsByClassName("colorCode");
var col = '';
var style = getComputedStyle(document.body);

for (item of el) {
	col = item.parentElement.style.backgroundColor;
	col = col.slice(5,-1);
	item.innerHTML += "<br>" + style.getPropertyValue(col);
}