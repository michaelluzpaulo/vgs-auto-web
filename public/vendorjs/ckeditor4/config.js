/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
  // Define changes to default configuration here. For example:
  config.language = "pt-br";
  // config.uiColor = '#AADC6E';
  config.extraPlugins = ["youtube,file-manager"];
  config.youtube_responsive = false;
  config.iframe_attributes = {
    sandbox: "allow-scripts allow-same-origin",
    // allow: "autoplay",
  };

  // config.extraPlugins = "file-manager";
  config.Flmngr = {
    apiKey: "FLMNFLMN", // Default free key
    // Get free own API key to use with a visual configurator:
    // https://flmngr.com/dashboard
    // urlFiles: "http://localhost:8000/ckfinder",

    urlFileManager: "/flmngr",
    urlFiles: "/ckfinder/userfiles",
  };

  // config.iframe_attributes = function (iframe) {
  //   const youtubeOrigin = "https://www.youtube.com";

  //   if (youtubeOrigin.indexOf(iframe.attributes.src) !== -1) {
  //     return { sandbox: "allow-scripts allow-same-origin" };
  //   }

  //   return { sandbox: "" };
  // };
  // config.youtube_height = "auto";

  // config.filebrowserBrowseUrl =
  //   "/vendorjs/ckeditor4/plugins/kcfinder/browse.php?opener=ckeditor&type=files";
  // config.filebrowserImageBrowseUrl =
  //   "/vendorjs/ckeditor4/plugins/kcfinder/browse.php?opener=ckeditor&type=images";
  // config.filebrowserUploadUrl =
  //   "/vendorjs/ckeditor4/plugins/kcfinder/upload.php?opener=ckeditor&type=files";
  // config.filebrowserImageUploadUrl =
  //   "/vendorjs/ckeditor4/plugins/kcfinder/upload.php?opener=ckeditor&type=images";

  config.toolbarGroups = [
    { name: "clipboard", groups: ["clipboard", "undo"] },
    { name: "editing", groups: ["find", "selection"] },
    { name: "document", groups: ["mode", "document", "doctools"] },
    { name: "insert" },
    "/",
    { name: "tools" },
    { name: "links" },
    //{ name: 'forms' },
    { name: "others" },
    { name: "basicstyles", groups: ["basicstyles", "cleanup"] },
    { name: "paragraph", groups: ["list", "indent", "blocks", "align"] },
    "/",
    { name: "styles" },
    { name: "colors" },
    { name: "about" },
  ];
};
