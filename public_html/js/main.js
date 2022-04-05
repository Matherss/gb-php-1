const openModal = () => {
  let overlays = document.querySelectorAll(".overlay");
  let images = document.querySelectorAll(".image");
  for (let i = 0; i <= images.length; i++) {
    images[i].addEventListener("click", () => {
      overlays[i].classList.value = "overlay active";
      let img = document.querySelector("body > main > div > div.imgs_wrapper > div.overlay.active > div");
      img.classList.value = "modal__active";
      console.log(images[i].classList);
    });
  }
  console.log(images);
};
const closeModal = () => {
  let openedOverlay = document.querySelectorAll("body > main > div > div.imgs_wrapper > div.overlay.active");
  let openedModal = document.querySelectorAll(".modal__active");
  for (let i = 0; i < openedOverlay.length; i++) {
    openedOverlay[i].addEventListener("click", () => {
      openedOverlay[i].classList.value = "overlay";
      for (let j = 0; j < openedModal.length; j++) {
        openedModal[j].classList.value = "image";
      }
    });
  }
};
openModal();
function incrementView(id) {
  console.log("work");
  fetch(`../engine/increment.php?id=${id}`, { method: "POST" }); // ajax, чтобы не делать лишних переходов по страницам
}
function deleteAllImages() {
  location.href = `../engine/deleter.php`; // тут специально сделал переход, чтобы страница внешне обновилась
}
