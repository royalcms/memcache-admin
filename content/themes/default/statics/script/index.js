$(document).ready(function () {

    $('#host').keyup(function () {
        $this = $(this);

        function host() {
            exp = /^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/;
            nexp = /^(127\.0\.0\.1)|(localhost)|(10\.\d{1,3}\.\d{1,3}\.\d{1,3})|(172\.((1[6-9])|(2\d)|(3[01]))\.\d{1,3}\.\d{1,3})|(192\.168\.\d{1,3}\.\d{1,3})$/;
            reg = $this.val().match(exp);
            regn = $this.val().match(nexp);
            if (reg == null || regn != null) {
                $this.addClass("is-invalid").removeClass("is-valid");
            } else {
                $this.addClass("is-valid").removeClass("is-invalid");
            }
        }

        host();
        $this.blur(function () {
            host();
        });
    });
    $('#port').keyup(function () {
        $this = $(this);

        function port() {
            if ($this.val().length > 5) {
                $this.addClass("is-invalid").removeClass("is-valid");
            } else {
                $this.addClass("is-valid").removeClass("is-invalid");
            }
        }

        port();
        $this.blur(function () {
            port();
        });
    });
    $("form").submit(function (e) {
        $this = $(this);
        $host = $('#host');
        $port = $('#port');
        exp = /^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/;
        nexp = /^(127\.0\.0\.1)|(localhost)|(10\.\d{1,3}\.\d{1,3}\.\d{1,3})|(172\.((1[6-9])|(2\d)|(3[01]))\.\d{1,3}\.\d{1,3})|(192\.168\.\d{1,3}\.\d{1,3})$/;
        reg = $host.val().match(exp);
        regn = $host.val().match(nexp);
        if (reg == null || regn != null || $port.val().length > 5) {
            e.preventDefault();
            $('.alert-dismissible').show();
        } else {
            $this.submit();
        }
    });
});