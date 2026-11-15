/**
 * STS Kollegal Event Photo Gallery Viewer (Native <dialog> Lightbox)
 */
(function () {
  "use strict";

  function initEventGalleries() {
    var cards = document.querySelectorAll(".evt-card .evt-gallery");
    if (!cards.length || !document.createElement("dialog").showModal) return;

    var dialog = document.createElement("dialog");
    dialog.className = "evt-lightbox";
    dialog.setAttribute("aria-label", "Event photo viewer");
    dialog.innerHTML =
      '<div class="evt-lightbox__top"><button type="button" class="evt-lightbox__close" aria-label="Close image viewer">Close <span aria-hidden="true">&times;</span></button></div>' +
      '<img class="evt-lightbox__image" alt="">' +
      '<p class="evt-lightbox__caption" aria-live="polite"></p>';

    document.body.appendChild(dialog);
    var closeButton = dialog.querySelector(".evt-lightbox__close");
    var viewerImage = dialog.querySelector(".evt-lightbox__image");
    var caption = dialog.querySelector(".evt-lightbox__caption");

    function closeViewer() {
      if (dialog.open) dialog.close();
    }

    closeButton.addEventListener("click", closeViewer);
    dialog.addEventListener("click", function (event) {
      if (event.target === dialog) closeViewer();
    });
    dialog.addEventListener("close", function () {
      viewerImage.removeAttribute("src");
      viewerImage.alt = "";
      caption.textContent = "";
    });

    cards.forEach(function (gallery) {
      gallery.querySelectorAll("img").forEach(function (image, index) {
        var figure = image.closest("figure");
        if (!figure || image.closest("a") || image.parentElement.classList.contains("evt-lightbox-trigger")) return;

        var trigger = document.createElement("button");
        trigger.type = "button";
        trigger.className = "evt-lightbox-trigger";
        trigger.setAttribute("aria-label", "Open image " + (index + 1) + ": " + (image.alt || "Event photograph"));
        image.parentNode.insertBefore(trigger, image);
        trigger.appendChild(image);

        trigger.addEventListener("click", function () {
          viewerImage.src = image.currentSrc || image.src;
          viewerImage.alt = image.alt || "Event photograph";
          caption.textContent = image.alt || "Event photograph";
          if (!dialog.open) dialog.showModal();
          closeButton.focus();
        });
      });
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initEventGalleries, { once: true });
  } else {
    initEventGalleries();
  }
}());
