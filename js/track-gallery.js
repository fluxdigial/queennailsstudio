// track-gallery.js
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("trackGalleryModal");
  const sliderEl = modal.querySelector("#lightSlider");
  let $sliderInstance = null;
  let busy = false;

  if (!modal || !sliderEl) return;

  function destroySliderIfExists() {
    try {
      const $el = jQuery(sliderEl);
      const data = $el.data("lightSlider");
      if (data && typeof data.destroy === "function") {
        data.destroy();
      }
      $el.removeData("lightSlider");
    } catch (err) {
      console.warn("destroySliderIfExists error:", err);
    } finally {
      sliderEl.innerHTML = "";
      $sliderInstance = null;
    }
  }

  // Mở gallery: render <li> và init lightSlider
  function openGallery(urls) {
    if (busy) return;
    busy = true;

    if (!Array.isArray(urls) || urls.length === 0) {
      console.warn("openGallery: invalid urls", urls);
      busy = false;
      return;
    }

    // destroy trước khi render
    destroySliderIfExists();

    urls.forEach((src, i) => {
      if (!src) return;
      const li = document.createElement("li");
      // dùng data-thumb để lightSlider tự tạo thumbnail
      li.setAttribute("data-thumb", src);
      li.innerHTML = `<img src="${src}" alt="image-${i}" />`;
      sliderEl.appendChild(li);
    });

    // show modal
    modal.classList.remove("hidden");
    document.body.classList.add("overflow-hidden");

    // small timeout để DOM render xong trước khi khởi tạo plugin
    setTimeout(() => {
      try {
        // khởi tạo lightSlider và lưu instance vào data
        $sliderInstance = jQuery(sliderEl).lightSlider({
          gallery: true,
          item: 1,
          loop: true,
          thumbItem: 7,
          slideMargin: 16,
          enableDrag: true,
          currentPagerPosition: "left",
          onSliderLoad: function (el) {
            // nếu muốn hook lightGallery (zoom) - optional
            if (jQuery.fn.lightGallery) {
              el.lightGallery({
                selector: "#lightSlider .lslide",
              });
            }
          },
        });

        // lưu lại nếu cần
        jQuery(sliderEl).data("lightSlider", $sliderInstance);

      } catch (e) {
        console.error("Failed to init lightSlider:", e);
      } finally {
        // unlock
        busy = false;
      }
    }, 50);
  }

  // Click vào item: dùng selector tìm phần tử có data-gallery (ảnh hoặc wrapper)
  document.querySelectorAll(".track__item [data-gallery]").forEach((el) => {
    el.addEventListener("click", function () {
      if (busy) return; // chặn nhanh
      let raw = this.dataset.gallery || "";
      console.log("Raw data-gallery:", raw);

      // fix &quot; nếu có (thường wp_json_encode + esc_attr tạo &quot;)
      const fixed = raw.replace(/&quot;/g, '"');

      let urls = [];
      try {
        urls = JSON.parse(fixed);
      } catch (err) {
        console.error("JSON parse failed for data-gallery:", err, raw);
        return;
      }

      // nếu mảng chứa object thay vì string url, map sang url (trong trường hợp khác)
      if (urls.length && typeof urls[0] === "object") {
        urls = urls.map(it => it && (it.url || it.src || it) ).filter(Boolean);
      }

      openGallery(urls);
    });
  });

  // Đóng modal và cleanup
  function closeModal() {
    // hide
    modal.classList.add("hidden");
    document.body.classList.remove("overflow-hidden");

    // destroy slider
    destroySliderIfExists();
  }
  // click nền để đóng
  modal.addEventListener("click", (e) => {
    if (e.target === modal) closeModal();
  });

  // optional: dọn dẹp khi unload page
  window.addEventListener("beforeunload", () => {
    destroySliderIfExists();
  });
});
