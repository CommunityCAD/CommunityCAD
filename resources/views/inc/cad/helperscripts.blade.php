<script>
    function startTime() {
        function convertTZ(date, tzString) {
            return new Date(
                (typeof date === "string" ? new Date(date) : date).toLocaleString(
                    "en-US", {
                        timeZone: tzString,
                    }
                )
            );
        }

        const today = convertTZ(new Date(), "{{ config('app.timezone') }}");
        let d = today.getDate();
        let mo = today.getMonth();
        let y = today.getFullYear();

        d = checkTime(d);
        mo = checkTime(mo + 1);

        let h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById("running_clock_date").innerHTML =
            mo + "/" + d + "/" + y;
        document.getElementById("running_clock_time").innerHTML =
            h + ":" + m + ":" + s;
        setTimeout(startTime, 1000);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        } // add zero in front of numbers < 10
        return i;
    }

    function openExternalWindow(url) {
        return window.open(
            url,
            "_blank",
            "height=800,width=900,scrollbars=no,status=yes",
            true
        );
    }

    function play(type) {
        var audio = document.getElementById(type);
        audio.play();
    }

    function flashPanic() {
        document.getElementById("flash_panic").classList.toggle("!bg-yellow-600");
    }
</script>
