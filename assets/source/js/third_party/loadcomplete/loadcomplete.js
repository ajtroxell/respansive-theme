jQuery.fn.loadComplete = function (fn) {
    return this.each(function () {
        if (this.complete || this.readyState == 'complete') {
            fn.call(this);
        } else {
            $(this).load(fn);
        }
    });
};