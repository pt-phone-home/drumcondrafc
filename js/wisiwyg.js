function iFrameOn() {
  richTextField.document.designMode = "On";
}
function iHeading() {
  richTextField.document.execCommand("FontSize", false, "16");
}
function iSubHeading() {
  richTextField.document.execCommand("FontSize", false, "14");
}
function iStandard() {
  richTextField.document.execCommand("FontSize", false, "12");
}
function iBold() {
  richTextField.document.execCommand("Bold", false, null);
}
function iUnderline() {
  richTextField.document.execCommand("underline", false, null);
}
function iItalic() {
  richTextField.document.execCommand("italic", false, null);
}
function iHorizontalRule() {
  richTextField.document.execCommand("Inserthorizontalrule", false, null);
}
function iUnorderedList() {
  richTextField.document.execCommand("InsertUnorderedList", false, "newUL");
}
function iOrderedList() {
  richTextField.document.execCommand("InsertOrderedList", false, "newOL");
}
function iLink() {
  let linkURL = prompt("Enter the URL for this link:", "http://");
  richTextField.document.execCommand("CreateLink", false, linkURL);
}
function iUnLink() {
  richTextField.document.execCommand("Unlink", false, null);
}
function submit_form() {
  let theForm = document.getElementById("myform");
  theForm.elements["content"].value =
    window.frames["richTextField"].document.body.innerHTML;
  theForm.submit();
}
