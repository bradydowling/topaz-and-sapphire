import PropTypes from "prop-types"
import React from "react"


const InstaHeader = ({ username }) => (
  <div class="sb_instagram_header" style={{ padding: "6px", paddingBottom: 0 }}>
    <a href={`https://www.instagram.com/${username}`} target="_blank" rel="noopener noreferrer" title="@topazandsapphire" class="sbi_header_link">
      <div class="sbi_header_text">
        <h3 class="sbi_no_bio">topazandsapphire</h3>
      </div>
      <div class="sbi_header_img">
        <div class="sbi_header_img_hover">
          <i class="sbi_new_logo"></i>
        </div>
        <img src="https://scontent.cdninstagram.com/vp/411926d8a72ca66db90deefb68f2c129/5DD5EA4B/t51.2885-19/s150x150/22069473_1491276570956904_3546274343627522048_n.jpg?_nc_ht=scontent.cdninstagram.com" alt="Topaz &amp; Sapphire" scale="0" width="50" height="50" />
      </div>
    </a>
  </div>
)

const InstaImage = () => (
  <div class="sbi_item sbi_type_image" id="sbi_1964016582191792672_1953708623" data-date="1548349043">
    <div class="sbi_photo_wrap">
      <a class="sbi_photo sbi_imgLiquid_bgSize sbi_imgLiquid_ready" href="https://www.instagram.com/p/BtBlqz6hMIg/" target="_blank" rel="noopener noreferrer" data-full-res="https://scontent.cdninstagram.com/vp/2861de80abad96191e7a97d7ba20a3bf/5DD11205/t51.2885-15/sh0.08/e35/p640x640/49380789_370482100180577_628094579137821647_n.jpg?_nc_ht=scontent.cdninstagram.com" style={{
        backgroundImage: "url(&quot;https://scontent.cdninstagram.com/vp/f715d6e4ed32cbcade8506da0f48a28f/5DE0C2E9/t51.2885-15/e35/p320x320/49380789_370482100180577_628094579137821647_n.jpg?_nc_ht=scontent.cdninstagram.com&quot;)",
        backgroundSize: "cover",
        backgroundPosition: "center center",
        backgroundRepeat: "no-repeat",
        height: "127px"
      }}>
        <img src="https://scontent.cdninstagram.com/vp/f715d6e4ed32cbcade8506da0f48a28f/5DE0C2E9/t51.2885-15/e35/p320x320/49380789_370482100180577_628094579137821647_n.jpg?_nc_ht=scontent.cdninstagram.com" alt="When you’re a freelancer or someone who works from home it’s important to get out of your PJs and venture off the couch once in a while. It’s amazing what a change of scenery can do for your productivity and creativity! We love this little #coffeeshop @sdamiani captured in #newyorknewyork! #wework #workfromhome #womenwhowork #career" style={{ display: "none" }} scale="0" width="200" height="200" />
      </a>
    </div>
  </div>
)

const InstaImages = () => (
  <div id="sbi_images" style={{ padding: "3px" }}>
    <InstaImage />
  </div>
)


const InstaFooter = ({ username }) => (
  <div id="sbi_load" class="" style={{ margin: "20px 0px 50px" }}>
    <span class="sbi_follow_btn"><a href={`https://www.instagram.com/${username}`} target="_blank" rel="noopener noreferrer"><svg class="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="instagram" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>Follow on Instagram</a></span>
  </div>
)

const InstagramFeed = ({ username }) => (
  <div id="instagram-feed">
    <div id="sb_instagram" class="sbi sbi_mob_col_auto sbi_col_7 sbi_medium" style={{ width: "100%", paddingBottom: "6px" }} data-num="14" data-res="auto" data-cols="7" data-sbi-index="1">
      <InstaHeader username={username} />
      <InstaImages />
      <InstaFooter username={username} />
    </div>
  </div>
)

InstagramFeed.propTypes = {
  username: PropTypes.string,
}

InstagramFeed.defaultProps = {
  username: ``,
}

export default InstagramFeed
