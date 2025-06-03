
// Create the first script element
var scScript = document.createElement("script");
scScript.type = "text/javascript";
scScript.src = "//widget.supercounters.com/ssl/online_i.js";
document.head.appendChild(scScript);

// Once the first script is loaded, execute the counter function
scScript.onload = function () {
    sc_online_i(1707252, "ffffff", "ffffff");
};

// Create a noscript fallback (this won't be visible unless JavaScript is disabled)
var noscript = document.createElement("noscript");
noscript.innerHTML = '<a href="https://www.supercounters.com/" style="visibility:hidden;">free online counter</a>';
document.body.appendChild(noscript);
