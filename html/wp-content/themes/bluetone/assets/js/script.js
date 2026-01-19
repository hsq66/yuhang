const { Fragment } = wp.element;
const { PanelBody, PanelRow } = wp.components;
const { InspectorControls, BlockControls } = wp.blockEditor;
const {
  PluginDocumentSettingPanel,
  PluginSidebar,
  PluginSidebarMoreMenuItem,
  PluginPostStatusInfo,
} = wp.editPost;
const { PluginPrePublishPanel } = wp.editPost;
const { registerBlockType } = wp.blocks;
const { Placeholder, Icon, Button, Tooltip } = wp.components;
const { __ } = wp.i18n;
const { createElement } = wp.element;
const themeLink =
  window.RealtimeThemesHelper?.themeUri || "https://wordpress.org/themes/";
const helperLink = "/wp-admin/admin.php?page=realtime-themes-helper";
const LOCK_ICON = createElement(Icon, {
  icon: "lock",
  style: { marginRight: "5px" },
});
const allowedBlocks = window.RealtimeThemesHelper?.allowedBlocks || [];
wp.hooks.addFilter(
  "editor.BlockEdit",
  "realtime-themes-helper/lock-all-blocks",
  (BlockEdit) => (props) => {
    if (!props.attributes.lock) {
      props.attributes.lock = {};
    }
    if (!allowedBlocks.includes(props.name)) {
      props.attributes.lock.move = true;
    } else {
      delete props.attributes.lock.move;
    }
    return wp.element.createElement(BlockEdit, props);
  }
);
const adPro = () =>
  createElement(
    "div",
    {
      style: {
        fontFamily: "'Bai Jamjuree', sans-serif",
        display: "flex",
        flexDirection: "column",
        gap: "10px",
        padding: "8px 0",
      },
    },
    createElement(
      "div",
      { style: { display: "flex", alignItems: "center" } },
      createElement(
        "span",
        { style: { marginLeft: "8px" } },
        "Access the full potential of your theme with the PRO version. Unlock exclusive patterns, premium templates, and advanced customization tools."
      )
    ),
    createElement(
      Button,
      {
        onClick: () => window.open(themeLink, "_blank"),
        style: {
          backgroundColor: "black",
          color: "white",
          borderRadius: "0.5rem",
          fontFamily: "'Bai Jamjuree', sans-serif",
          padding: "6px 14px",
          border: "none",
          width: "100%",
          textAlign: "center",
          display: "flex",
          alignItems: "center",
          justifyContent: "center",
        },
      },
      "Get PRO"
    ),
    createElement(
      Button,
      {
        onClick: () => window.open(helperLink, "_blank"),
        style: {
          backgroundColor: "white",
          color: "black",
          borderRadius: "0.5rem",
          fontFamily: "'Bai Jamjuree', sans-serif",
          padding: "6px 14px",
          border: "1px black solid",
          width: "100%",
          textAlign: "center",
          display: "flex",
          alignItems: "center",
          justifyContent: "center",
        },
      },
      "Unlock blocks"
    )
  );
const MyPrePublishPanel = () => {
  return createElement(
    PluginPrePublishPanel,
    {
      name: "pre-publish-panel",
    },
    createElement(
      "div",
      {},
      createElement(
        "strong",
        { style: { display: "block", marginBottom: "8px" } },
        "Unlock all features"
      ),
      createElement(adPro)
    )
  );
};
const MyPluginSidebarMoreMenuItem = () => {
  return createElement(
    PluginSidebarMoreMenuItem,
    {
      name: "sidebar-more-menu-item",
    },
    createElement(
      "div",
      {},
      createElement(
        "strong",
        { style: { display: "block", marginBottom: "8px" } },
        "Unlock all features"
      ),
      createElement(adPro)
    )
  );
};
const MyPluginPostStatusInfo = () => {
  return createElement(
    PluginPostStatusInfo,
    {
      name: "post-status-info",
    },
    createElement(
      "div",
      {},
      createElement(
        "strong",
        { style: { display: "block", marginBottom: "8px" } },
        "Unlock all features"
      ),
      createElement(adPro)
    )
  );
};
const MyPluginDocumentSettingPanel = () => {
  return createElement(
    PluginDocumentSettingPanel,
    {
      name: "document-setting-panel",
    },
    createElement(
      "div",
      {},
      createElement(
        "strong",
        { style: { display: "block", marginBottom: "8px" } },
        "Unlock all features"
      ),
      createElement(adPro)
    )
  );
};
const MyPluginSidebar = () =>
  createElement(
    PluginSidebar,
    {
      name: "real-time-themes-helper-sidebar",
      title: "Unlock all features",
    },
    wp.element.createElement(
      "div",
      { style: { padding: "15px" } },
      wp.element.createElement(adPro)
    )
  );
wp.plugins.registerPlugin("real-time-themes-helper-sidebar", {
  render: MyPluginSidebar,
});
wp.plugins.registerPlugin("pre-publish-panel", {
  render: MyPrePublishPanel,
});
wp.plugins.registerPlugin("sidebar-more-menu-item", {
  render: MyPluginSidebarMoreMenuItem,
});
wp.plugins.registerPlugin("post-status-info", {
  render: MyPluginPostStatusInfo,
});
wp.plugins.registerPlugin("document-setting-panel", {
  render: MyPluginDocumentSettingPanel,
});
wp.hooks.addFilter(
  "editor.BlockEdit",
  "real-time-themes-helper/ad-pro-core-group",
  (BlockEdit) => (props) => {
    return createElement(
      Fragment,
      {},
      createElement(BlockEdit, props),
      createElement(
        InspectorControls,
        {},
        createElement(
          PanelBody,
          { title: "Unlock all features", initialOpen: true },
          createElement(adPro, {})
        )
      )
    );
  }
);
