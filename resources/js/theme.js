const STORAGE_KEY = 'theme';
const VALID_THEMES = ['light', 'dark'];

const systemTheme = () =>
    window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

const currentTheme = () => {
    const attribute = document.documentElement.getAttribute('data-theme');
    return VALID_THEMES.includes(attribute) ? attribute : systemTheme();
};

const storedTheme = () => {
    try {
        const theme = localStorage.getItem(STORAGE_KEY);
        return VALID_THEMES.includes(theme) ? theme : null;
    } catch (error) {
        return null;
    }
};

const applyTheme = (theme) => {
    document.documentElement.setAttribute('data-theme', theme);
    document.documentElement.style.colorScheme = theme;

    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        const isDark = theme === 'dark';
        button.setAttribute('aria-pressed', String(isDark));
        button.setAttribute('aria-label', isDark ? 'Switch to light theme' : 'Switch to dark theme');
        button.setAttribute('title', isDark ? 'Switch to light theme' : 'Switch to dark theme');
    });

    window.dispatchEvent(new CustomEvent('themechange', { detail: { theme } }));
};

const setTheme = (theme) => {
    if (!VALID_THEMES.includes(theme)) return;

    try {
        localStorage.setItem(STORAGE_KEY, theme);
    } catch (error) {
        // Theme still applies for this page when storage is unavailable.
    }

    applyTheme(theme);
};

export const initTheme = () => {
    applyTheme(storedTheme() || currentTheme());

    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            setTheme(currentTheme() === 'dark' ? 'light' : 'dark');
        });
    });

    window.addEventListener('storage', (event) => {
        if (event.key === STORAGE_KEY && VALID_THEMES.includes(event.newValue)) {
            applyTheme(event.newValue);
        }
    });

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        if (!storedTheme()) applyTheme(systemTheme());
    });
};
