document.addEventListener("DOMContentLoaded", function () {
  const e = new Splide("#academic-slider", {
      type: "loop",
      perPage: 3,
      gap: "2rem",
      padding: "1rem",
      pagination: !1,
      arrows: !0,
      breakpoints: {
        1024: { perPage: 3 },
        768: { perPage: 2 },
        640: { perPage: 1, padding: "2rem" },
      },
    }).mount(),
    t = new Splide("#testimonial-slider", {
      type: "loop",
      perPage: 3,
      gap: "1.5rem",
      padding: "0.5rem",
      pagination: !0,
      arrows: !1,
      breakpoints: {
        1024: { perPage: 2 },
        640: { perPage: 1, padding: "0rem" },
      },
    }).mount(),
    a = new Splide("#programs-slider", {
      type: "loop",
       autoplay: true,
  interval: 1500, 
  pauseOnHover: true,
    perMove: 1,
      perPage: 4,
      gap: "1.5rem",
      padding: "1rem",
      pagination: !1,
      arrows: true,
      breakpoints: {
        1280: { perPage: 4 },
        1024: { perPage: 3 },
        768: { perPage: 2 },
        640: { perPage: 1, padding: "0.5rem",  pagination: !0 },
      },
    }).mount();
  AOS.init({ once: !0, offset: 50, duration: 800, easing: "ease-out-cubic" });
  const n = new IntersectionObserver(
      (e, t) => {
        e.forEach((e) => {
          e.isIntersecting &&
            ((() => {
              const e = document.querySelectorAll(".counter"),
                t = 1e3 / 60,
                a = Math.round(119.99999999999999);
              e.forEach((e) => {
                let n = 0;
                const o = parseInt(e.getAttribute("data-target"), 10),
                  s = setInterval(() => {
                    n++;
                    const t = n / a,
                      d = 1 - Math.pow(1 - t, 3),
                      i = Math.round(o * d);
                    ((e.innerText = i),
                      n === a && (clearInterval(s), (e.innerText = o)));
                  }, t);
              });
            })(),
            t.disconnect());
        });
      },
      { threshold: 0.5 },
    ),
    o = document.getElementById("hero-stats");
  (o && n.observe(o),
    window.addEventListener("load", function () {
      (e.refresh(), t.refresh(), a.refresh());
    }));
  document.querySelectorAll(".faq-toggle").forEach((e) => {
    e.addEventListener("click", () => {
      const t = e.nextElementSibling,
        a = e.querySelector(".faq-icon");
      (t.classList.toggle("hidden"),
        t.classList.contains("hidden")
          ? a.classList.add("rotate-180")
          : a.classList.remove("rotate-180"));
    });
  });
  const s = document.getElementById("admission-modal"),
    d = document.getElementById("modal-backdrop"),
    i = document.getElementById("modal-content"),
    r = document.getElementById("close-modal-btn");
  function c() {
    (s.classList.remove("hidden"),
      s.classList.add("flex"),
      document.body.classList.add("overflow-hidden"),
      setTimeout(() => {
        (d.classList.remove("opacity-0"),
          d.classList.add("opacity-100"),
          i.classList.remove("opacity-0", "scale-95"),
          i.classList.add("opacity-100", "scale-100"));
      }, 10));
  }
  function l() {
    (d.classList.remove("opacity-100"),
      d.classList.add("opacity-0"),
      i.classList.remove("opacity-100", "scale-100"),
      i.classList.add("opacity-0", "scale-95"),
      document.body.classList.remove("overflow-hidden"),
      setTimeout(() => {
        (s.classList.add("hidden"), s.classList.remove("flex"));
      }, 300));
  }
  (document.querySelectorAll(".open-modal-btn").forEach((e) => {
    e.addEventListener("click", (e) => {
      (e.preventDefault(), c());
    });
  }),
    r.addEventListener("click", l),
    d.addEventListener("click", l),
    document.addEventListener("keydown", (e) => {
      "Escape" !== e.key || s.classList.contains("hidden") || l();
    }),
    s && setTimeout(c, 1e4));
});





document.addEventListener("DOMContentLoaded", function () {

    // Only mobile view
    if (window.innerWidth > 767) {
        return;
    }

    // Target ALL branch selects by name
    const branchSelects = document.querySelectorAll(
        'select[name="branch"]'
    );

    branchSelects.forEach(function (select) {

        // Avoid duplicate initialization
        if (select.dataset.customBranch === "true") {
            return;
        }

        select.dataset.customBranch = "true";

        // Hide original select
        select.classList.add("hidden");

        // Create custom wrapper
        const wrapper = document.createElement("div");
        wrapper.className = "relative w-full";

        // Create trigger button
        const button = document.createElement("button");

        button.type = "button";

        button.className =
            "w-full px-4 py-3 border border-gray-300 rounded bg-gray-50 text-left text-gray-500 flex justify-between items-center";

        setSelectedText(
            button,
            select.options[select.selectedIndex]
        );

        // Full-screen overlay
        const overlay = document.createElement("div");

        overlay.className =
            "fixed inset-0 bg-white z-[99999] hidden flex-col";

        // Header
        const header = document.createElement("div");

        header.className =
            "flex items-center justify-between px-5 py-4 border-b border-gray-200";

        header.innerHTML = `
            <span class="text-base font-semibold text-gray-800">
                Select Branch
            </span>

            <button type="button"
                class="text-2xl text-gray-600 leading-none">
                &times;
            </button>
        `;

        const closeButton = header.querySelector("button");

        // Options container
        const optionsContainer = document.createElement("div");

        optionsContainer.className =
            "flex-1 overflow-y-auto";

        // Create options
        Array.from(select.options).forEach(function (option) {

            const item = document.createElement("div");

            item.className =
                "px-5 py-4 border-b border-gray-100 text-base text-gray-800 cursor-pointer";

            const text = option.text.trim();

            if (option.value !== "" && text.length > 0) {

                item.innerHTML =
                    `<span class="font-bold text-black">
                        ${text.charAt(0)}
                    </span>${text.substring(1)}`;

            } else {

                item.textContent = text;
            }

            // Option click
            item.addEventListener("click", function () {

                // Keep original select value
                select.value = option.value;

                // Update visible button
                setSelectedText(button, option);

                // Close full screen dropdown
                overlay.classList.add("hidden");
                overlay.classList.remove("flex");

                // Trigger existing onchange
                select.dispatchEvent(
                    new Event("change", {
                        bubbles: true
                    })
                );
            });

            optionsContainer.appendChild(item);
        });

        // Close button
        closeButton.addEventListener("click", function () {

            overlay.classList.add("hidden");
            overlay.classList.remove("flex");

        });

        // Open dropdown
        button.addEventListener("click", function () {

            overlay.classList.remove("hidden");
            overlay.classList.add("flex");

        });

        // Build overlay
        overlay.appendChild(header);
        overlay.appendChild(optionsContainer);

        // Build wrapper
        wrapper.appendChild(button);
        wrapper.appendChild(overlay);

        // Put custom dropdown before original select
        select.parentNode.insertBefore(wrapper, select);
    });


    // Selected value display
    function setSelectedText(button, option) {

        const text = option.text.trim();

        if (option.value !== "" && text.length > 0) {

            button.innerHTML = `
                <span>
                    <span class="font-bold text-black">
                        ${text.charAt(0)}
                    </span>${text.substring(1)}
                </span>

                <span class="text-xs">▼</span>
            `;

        } else {

            button.innerHTML = `
                <span>${text}</span>
                <span class="text-xs">▼</span>
            `;
        }
    }

});


