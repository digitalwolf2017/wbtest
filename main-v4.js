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
    const select = document.getElementById("branch_3");
    if (!select) return;

    // Hide original select visually but keep it functional for forms
    select.classList.add("hidden");

    // Create custom dropdown wrapper
    const wrapper = document.createElement("div");
    wrapper.className = "relative w-full text-sm text-gray-700";

    // Create trigger button
    const button = document.createElement("button");
    button.type = "button";
    button.className = "w-full px-4 py-3 border border-gray-300 rounded bg-gray-50 text-left text-gray-500 focus:outline-none focus:border-brandBlue flex justify-between items-center";
    button.innerHTML = `<span>${select.options[select.selectedIndex].text}</span><span class="text-xs">▼</span>`;

    // Create options list container
    const list = document.createElement("ul");
    list.className = "absolute z-50 mt-1 w-full bg-white border border-gray-300 rounded shadow-lg max-h-60 overflow-y-auto hidden";

    // Populate custom options
    Array.from(select.options).forEach((option) => {
        const li = document.createElement("li");
        li.className = "px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-900";
        
        // Highlight first letter using HTML layout style
        const text = option.text;
        if(text && option.value !== "") {
            li.innerHTML = `<span class="font-bold text-black-600">${text.charAt(0)}</span>${text.slice(1)}`;
        } else {
            li.textContent = text; // "Select Branch" placeholder text
        }

        // Handle item selection clicks
        li.addEventListener("click", () => {
            select.value = option.value;
            
            // Format selected option preview text
            if(option.value !== "") {
                button.innerHTML = `<span><span class="font-bold text-black-600">${text.charAt(0)}</span>${text.slice(1)}</span><span class="text-xs">▼</span>`;
            } else {
                button.innerHTML = `<span>${text}</span><span class="text-xs">▼</span>`;
            }
            
            list.classList.add("hidden");

            // Explicitly trigger your native onchange functions
            select.dispatchEvent(new Event('change'));
        });

        list.appendChild(li);
    });

    // Toggle list visibility
    button.addEventListener("click", (e) => {
        e.stopPropagation();
        list.classList.toggle("hidden");
    });

    // Close when clicking outside dropdown menu
    document.addEventListener("click", () => list.classList.add("hidden"));

    wrapper.appendChild(button);
    wrapper.appendChild(list);
    select.parentNode.insertBefore(wrapper, select);
});


