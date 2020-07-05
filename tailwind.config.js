const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: ["./resources/**/*.blade.php"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans]
            }
        }
    },
    plugins: [require("@tailwindcss/ui")]
};
