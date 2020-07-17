const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    // purge: ["./resources/**/*.blade.php"],
    theme: {
        extend: {
            fontFamily: {
                display: ["Gilroy", ...defaultTheme.fontFamily.sans],
                sans: ["Inter var", ...defaultTheme.fontFamily.sans]
            }
        }
    },
    plugins: [require("@tailwindcss/ui")],
    purge: false
};
