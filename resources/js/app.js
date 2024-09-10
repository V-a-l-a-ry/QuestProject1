import "./bootstrap";

document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.querySelector("#project-carousel");
    const prevButton = document.querySelector("#prev-project");
    const nextButton = document.querySelector("#next-project");
    const counter = document.querySelector("#project-counter");
    const projects = carousel.querySelectorAll(".min-w-full");

    if (!prevButton || !nextButton || !counter || projects.length === 0) {
        console.error("Element not found or no projects available");
        return;
    }

    let currentIndex = 0;

    function scrollToIndex(index) {
        const project = projects[index];
        if (project) {
            project.scrollIntoView({
                behavior: "smooth",
                block: "nearest", // Adjust vertical alignment if needed
                inline: "center", // Centers the element horizontally in the viewport
            });
            updateCounter(index);
        }
    }

    function updateCounter(index) {
        const totalProjects = projects.length;
        counter.textContent = `${index + 1}/${totalProjects}`;
    }

    prevButton.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            scrollToIndex(currentIndex);
        }
    });

    nextButton.addEventListener("click", () => {
        if (currentIndex < projects.length - 1) {
            currentIndex++;
            scrollToIndex(currentIndex);
        }
    });

    // Initialize the counter on page load
    updateCounter(currentIndex);
});
