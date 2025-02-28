const govukEleventyPlugin = require('@x-govuk/govuk-eleventy-plugin')

module.exports = function(eleventyConfig) {
    // Register the plugin
    eleventyConfig.addPlugin(govukEleventyPlugin, {
        icons: {
            mask: false,
            shortcut: false,
            touch: false,
        },
        showBreadcrumbs: false,
        titleSuffix: "Women's Business Council",
        header: {
            logotype: {
                text: "Women's Business Council"
            },
        },
        navigation: {
            items: [
                {
                    text: 'Home',
                    href: '/',
                },
                {
                    text: 'About',
                    href: '/about/',
                },
                {
                    text: 'Members',
                    href: '/members/',
                },
                {
                    text: 'Resources',
                    href: '/resources/',
                },
            ],
        },
        footer: {
            copyright: false,
        },
    });

    // Copy `img/` to `_site/img`
    eleventyConfig.addPassthroughCopy("app/images");

    // Copy any .pdf file to `_site`, via Glob pattern
    // Keeps the same directory structure.
    eleventyConfig.addPassthroughCopy("app/**/*.pdf");

    eleventyConfig.addCollection("members_sorted", function (collectionsApi) {
        return collectionsApi.getFilteredByTag('member').sort(function (a, b) {
            return a.data.order - b.data.order;
        });
    });

    return {
        dataTemplateEngine: 'njk',
        htmlTemplateEngine: 'njk',
        markdownTemplateEngine: 'njk',
        dir: {
            // The folder where all your content will live:
            input: 'app',
            // Use layouts from the plugin
            layouts: '../node_modules/@x-govuk/govuk-eleventy-plugin/layouts'
        },
    };
};