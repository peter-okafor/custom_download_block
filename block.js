const { registerBlockType } = wp.blocks;
const { TextControl } = wp.components;
const { useBlockProps } = wp.blockEditor;

registerBlockType("custom/download-button", {
    title: "Download Button",
    icon: "download",
    category: "common",
    attributes: {
        url: { type: "string", default: "#" }
    },
    edit: ({ attributes, setAttributes }) => {
        return (
            <div {...useBlockProps()}>
                <TextControl
                    label="PDF URL"
                    value={attributes.url}
                    onChange={(url) => setAttributes({ url })}
                />
                <p style={{ display: "inline-flex", alignItems: "center", gap: "6px" }}>
                    Download PDF
                    <img src={window.location.origin + "/wp-content/plugins/custom-download-block/arrow-right.svg"} 
                         alt="Go" width="16" height="16" />
                </p>
            </div>
        );
    },
    save: () => null, // Rendered by PHP
});
