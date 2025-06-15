console.log("Starting script");  /*test to ensure the script is loaded*/

(function () {

    const app = {
        titleElements: document.querySelectorAll(".section_title"),
        windowHeight: window.innerHeight,

        init() {
            window.addEventListener("scrollend", () => {
                this.addAnimation();
            });
        },

        addAnimation() {
            for (const titleElement of this.titleElements) {
                const elementBox = titleElement.getBoundingClientRect();
                if (elementBox.bottom <= this.windowHeight - 50) {
                    titleElement.classList.add('animate');
                }
            }
        }
    }
    app.init();
})()

console.log("End of script"); /*test to ensure the script is read */