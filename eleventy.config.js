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
    })

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
    }
};