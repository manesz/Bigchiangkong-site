<!---- CONTACT ----->
<div id="contact" class="contact">
    <div class="container">
        <h2>ช่องทางการติดต่อ</h2>
        <span> </span>
        <!----contact-grids---->
        <div class="contact-grids">
            <div class="col-md-6 contact-left">
                <form>
                    <input type="text" value="Your beautiful name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your beautiful name';}">
                    <input type="text" value="Your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email address';}">
                    <textarea rows="2" cols="70" onfocus="if(this.value == 'Leave your message') this.value='';" onblur="if(this.value == '') this.value='Leave your message';">Leave your message</textarea>
                    <input type="submit" value="SEND MESSAGE" />
                    <div class="clearfix"> </div>
                </form>
            </div>
            <div class="col-md-6 contact-right">
                <p>
                    หจก. มหาสวัสดิ์ มอเตอร์ (บิ๊กเซียงกง)<br/>
                    MAHASAWAT MOTOR LTD. PART. (BIG CHIANGKONG)
                </p>
                <p>จำหน่าย : เครื่องยนต์ หัวเก๋ง อะไหล่เก่าญี่ปุ่น รถ 4ล้อ, 6ล้อ, 10ล้อ, 12ล้อ</p>
                <div class="address">
                    <label>เบอร์โทรศัพท์ : 034-990-254</label>
                    <label>เบอร์แฟ็ก : 034-990-255</label>
                </div>
                <div class="clearfix"> </div>
                <!--                <div class="address">-->
                <!--                    <label>CREATIVE BUILDING 58</label>-->
                <!--                    <label>3083 Romines Mill Road</label>-->
                <!--                    <label>Boston, MA 02201  </label>-->
                <!--                </div>-->
                <!--                <div class="clearfix"> </div>-->
                <!--                <div class="social-share">-->
                <!--                    <h4>ON SOCIAL</h4>-->
                <!--                    <ul class="unstyled-list list-inline">-->
                <!--                        <li><a class="facebook" href="#"><span> </span></a></li>-->
                <!--                        <li><a class="twitter" href="#"><span> </span></a></li>-->
                <!--                        <li><a class="googlepluse" href="#"><span> </span></a></li>-->
                <!--                        <li><a class="dribbble" href="#"><span> </span></a></li>-->
                <!--                        <div class="clearfix"> </div>-->
                <!--                    </ul>-->
                <!--                </div>-->
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!---- CONTACT ----->

<div class="copy-right text-center">
    <div class="container">
        <p>develop by <a href="http://www.ideacorners.com">Idea Corners Studio co.,ltd.</a></p>
        <label>Copyright 2014. All rights reserved.</label>
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                 var defaults = {
                 containerID: 'toTop', // fading element id
                 containerHoverID: 'toTopHover', // fading element hover id
                 scrollSpeed: 1200,
                 easingType: 'linear'
                 };
                 */

                $().UItoTop({ easingType: 'easeOutQuart' });

            });
        </script>
        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>