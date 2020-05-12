window.spotlightSettings = {
  workspaceId: scriptData.workspaceId,
};
!(function () {
  function t() {
    console.log("RUNNING");

    var t,
      e,
      n,
      a = document.createElement("script"),
      o = document.getElementsByTagName("script")[0];
    (t = "https://spotlight-api.herokuapp.com/v1/widget/version"),
      (e = function (t) {
        var e = t;
        (a.type = "text/javascript"),
          (a.async = !0),
          (a.src =
            "https://cdn.jsdelivr.net/npm/@trolley/spotlight@" +
            e +
            "/spotlight.min.js"),
          o.parentNode.insertBefore(a, o);
      }),
      ((n = new XMLHttpRequest()).onreadystatechange = function () {
        4 === n.readyState && 200 === n.status && e && e(n.responseText);
      }),
      n.open("GET", t, !0),
      n.send(null);
  }
  window.attachEvent
    ? window.attachEvent("onload", t)
    : window.addEventListener("load", t, !1);
})();
