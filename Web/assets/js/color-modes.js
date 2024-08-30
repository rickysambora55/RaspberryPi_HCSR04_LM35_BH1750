const getStoredTheme = () => localStorage.getItem("theme");
const setStoredTheme = (theme) => localStorage.setItem("theme", theme);

const getPreferredTheme = () => {
    const storedTheme = getStoredTheme();
    if (storedTheme) {
        return storedTheme;
    }

    return window.matchMedia("(prefers-color-scheme: dark)").matches
        ? "dark"
        : "light";
};

const setTheme = (theme) => {
    if (
        theme === "auto" &&
        window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
        document.documentElement.setAttribute("data-bs-theme", "dark");
    } else {
        document.documentElement.setAttribute("data-bs-theme", theme);
    }
};

setTheme(getPreferredTheme());

const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector("#bd-theme");

    if (!themeSwitcher) {
        return;
    }

    const themeSwitcherText = document.querySelector("#bd-theme-text");
    const activeThemeIcon = document.querySelector(".theme-icon-active use");
    const btnToActive = document.querySelector(
        `[data-bs-theme-value="${theme}"]`
    );
    const svgOfActiveBtn = btnToActive
        .querySelector("svg use")
        .getAttribute("href");

    document.querySelectorAll("[data-bs-theme-value]").forEach((element) => {
        element.classList.remove("active");
        element.setAttribute("aria-pressed", "false");
    });

    btnToActive.classList.add("active");
    btnToActive.setAttribute("aria-pressed", "true");
    activeThemeIcon.setAttribute("href", svgOfActiveBtn);
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
    themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

    if (focus) {
        themeSwitcher.focus();
    }
};

window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", () => {
        const storedTheme = getStoredTheme();
        if (storedTheme !== "light" && storedTheme !== "dark") {
            setTheme(getPreferredTheme());
        }
    });

window.addEventListener("DOMContentLoaded", () => {
    showActiveTheme(getPreferredTheme());

    document.querySelectorAll("[data-bs-theme-value]").forEach((toggle) => {
        toggle.addEventListener("click", () => {
            const theme = toggle.getAttribute("data-bs-theme-value");
            setStoredTheme(theme);
            setTheme(theme);
            showActiveTheme(theme, true);
        });
    });
});

// Chart
const darkGrid = "#393D41";
const darkText = "#DEE2E6";
const lightGrid = "#E6E6E6";
const lightText = "#495057";
$("#dark-theme").click(function () {
    chartData.options.scales.x.grid.color = darkGrid;
    chartData.options.scales.y.grid.color = darkGrid;
    chartData.options.scales.x.ticks.color = darkText;
    chartData.options.scales.y.ticks.color = darkText;
    chartData.options.plugins.legend.labels.color = darkText;
    chartData.update();
});
$("#light-theme").click(function () {
    chartData.options.scales.x.grid.color = lightGrid;
    chartData.options.scales.y.grid.color = lightGrid;
    chartData.options.scales.x.ticks.color = lightText;
    chartData.options.scales.y.ticks.color = lightText;
    chartData.options.plugins.legend.labels.color = lightText;
    chartData.update();
});
$("#auto-theme").click(function () {
    chartData.options.scales.x.grid.color = darkGrid;
    chartData.options.scales.y.grid.color = darkGrid;
    chartData.options.scales.x.ticks.color = darkText;
    chartData.options.scales.y.ticks.color = darkText;
    chartData.options.plugins.legend.labels.color = darkText;
    chartData.update();
});
