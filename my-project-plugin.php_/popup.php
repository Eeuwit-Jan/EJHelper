<div class='div-popup'>
    <!-- title of the pop-up -->
    <div class='div-popup-header'>
        <span>Accessibility Adjustments</span>
    </div>

    <div class='div-popup-content'>
        <!-- Pop-up content, the focus option -->
        <div class='div-popup-content-titles'>
            <span>Focus Adjustment</span>
        </div>

        <div class='div-popup-content-options'>
            <input type="checkbox" class="action-adhd-modus" id="adhd-modus" value="adhd-focus-modus" name="adhd-modus">ADHD Modus<br>
        </div>

        <!-- Pop-up, the change content options -->
        <div class='div-popup-content-titles'>
            <span>Content Adjustments</span>
        </div>

        <div class='div-popup-content-options'>

            <input type="checkbox" class="action-adjust-lineheight" id="adjust-lineheight" value="adjust-all-lineheight" name="adjust-lineheight">Adjust Lineheight<br>

            <input type="checkbox" class="action-highlight-titles" id="highlight-titles" value="highlight-all-titles" name="highlight-titles">Highlight Titles<br>

            <input type="checkbox" class="action-highlight-links" id="highlight-links" value="highlight-all-links" name="highlight-links">Highlight links<br>

            <input type="checkbox" class="action-change-scaling" id="change-scaling" value="change-scaling-zoom" name="change-scaling">Content scaling<br>

        </div>

        <div class='div-popup-content-titles'>
            <span>Orientation Adjustments</span>
        </div>

        <!-- radio buttons, change cursor options -->


        <!--   setCookie('ej-helper-cursor', 'change-cursor-black', 30); -->
        <!-- <input type="button" value="set" onclick="setCookie()"> -->

        <div class='div-popup-content-options'>

            <!-- <input type="radio" class="action-change-cursor" id="change-cursor" value="change-cursor-black" name="ej-helper-cursor-black" onclick="setCookie('ej-helper-cursor-black', 'change-cursor-black', 60)" ;>Big Black Cursor<br> -->


            <input type="radio" class="action-change-cursor" id="change-cursor-black" value="change-cursor-black" name="change-cursor">Big Black Cursor<br>

            <input type="radio" class="action-change-cursor" id="change-cursor-white" value="change-cursor-white" name="change-cursor">Big White Cursor<br>

            <input type="radio" class="action-change-cursor" id="change-cursor-normal" value="change-cursor-normal" name="change-cursor">Normal Cursor<br>
        </div>

    </div>

</div>

<!-- change the cursor -->
<script>
    function onChangeCursor(element) {
        const cursorType = element.value;
        console.log(cursorType);
        //Big Black Cursor
        if (cursorType == 'change-cursor-black') {
            //loads the png over the body and overwrites the default cursor
            jQuery('body *').css('cursor', 'url(<?= plugins_url('/assets/bbc.png', __FILE__) ?> ), auto ');

            //Big White Cursor
        } else if (cursorType == 'change-cursor-white') {
            //loads the png over the body and overwrites the default cursor
            jQuery('body *').css('cursor', 'url(<?= plugins_url('/assets/bwc.png', __FILE__) ?> ), auto ');

            //Default cursor
        } else if (cursorType == 'change-cursor-normal') {
            //loads nothing over the body and returns to the default cursor
            jQuery('body *').css('cursor', 'url(<?= plugins_url('', __FILE__) ?> ), auto ');
        }
    }
</script>

<!-- pop up buttonicon -->
<button class=' action-toggle-popup'>
    <img class="pop_up_btn" src="<?= plugins_url('/assets/accessibilityicon.png', __FILE__) ?>" alt="accessibility popup icon" />
</button>

<script>
    // toggle pop-up
    jQuery('.action-toggle-popup').click(() => {
        jQuery('.div-popup').slideToggle('fast');
    });
    // change cursor
    jQuery(document).ready(() => {
        jQuery('.action-change-cursor').click((event) => {
            onChangeCursor(event.currentTarget);
        });

        getCookie('ej-helper-cursor-black');

    });

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        let user = getCookie("username");
        if (user != "") {
            alert("Welcome again " + user);
        } else {
            user = prompt("Please enter your name:", "");
            if (user != "" && user != null) {
                setCookie("username", user, 365);
            }
        }
    }
    //cookie checked see console on page
    document.getElementById('change-cursor-black').value = true
</script>