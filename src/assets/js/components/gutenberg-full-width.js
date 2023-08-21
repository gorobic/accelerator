function addToDOMScrollbarWidth() {
	const scrollbarWidth = window.innerWidth - document.body.clientWidth;
	document.body.style.setProperty("--scrollbarWidth", `${scrollbarWidth}px`);
}

addToDOMScrollbarWidth();

window.addEventListener("resize", function () {
	addToDOMScrollbarWidth();
});
