let changedBut = document.getElementById("Save");
changedBut.addEventListener("click", function () {
  let deletedContent = changedBut.parentElement;
  changedBut.innerHTML = "Updated";

  console.log(deletedContent.childNodes);
  deletedContent.removeChild(deletedContent.childNodes[3]);
});
