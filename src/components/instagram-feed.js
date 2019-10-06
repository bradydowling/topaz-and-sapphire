import PropTypes from "prop-types";
import React from "react";
import "../styles/sb-instagram.css";


const InstaHeader = ({ username }) => (
  <div className="sb_instagram_header" style={{ padding: "6px", paddingBottom: 0 }}>
    <a href={`https://www.instagram.com/${username}`} target="_blank" rel="noopener noreferrer" title="@topazandsapphire" className="sbi_header_link">
      <div className="sbi_header_text">
        <h3 className="sbi_no_bio">topazandsapphire</h3>
      </div>
      <div className="sbi_header_img">
        <div className="sbi_header_img_hover">
          <i className="sbi_new_logo"></i>
        </div>
        <img src="https://scontent.cdninstagram.com/vp/411926d8a72ca66db90deefb68f2c129/5DD5EA4B/t51.2885-19/s150x150/22069473_1491276570956904_3546274343627522048_n.jpg?_nc_ht=scontent.cdninstagram.com" alt="Topaz &amp; Sapphire" scale="0" width="50" height="50" />
      </div>
    </a>
  </div>
)

const InstaImage = ({ imgLink }) => (
  <div className="sbi_item sbi_type_image" id="sbi_1964016582191792672_1953708623" data-date="1548349043">
    <div className="sbi_photo_wrap">
      <a className="sbi_photo sbi_imgLiquid_bgSize sbi_imgLiquid_ready" href="https://www.instagram.com/p/BtBlqz6hMIg/" target="_blank" rel="noopener noreferrer" data-full-res="https://scontent.cdninstagram.com/vp/2861de80abad96191e7a97d7ba20a3bf/5DD11205/t51.2885-15/sh0.08/e35/p640x640/49380789_370482100180577_628094579137821647_n.jpg?_nc_ht=scontent.cdninstagram.com" style={{
        backgroundImage: `url('${imgLink}')`,
        backgroundSize: "cover",
        backgroundPosition: "center center",
        backgroundRepeat: "no-repeat"
      }}>
        <img src={imgLink} alt="When you’re a freelancer or someone who works from home it’s important to get out of your PJs and venture off the couch once in a while. It’s amazing what a change of scenery can do for your productivity and creativity! We love this little #coffeeshop @sdamiani captured in #newyorknewyork! #wework #workfromhome #womenwhowork #career" scale="0" width="200" height="200" />
      </a>
    </div>
  </div>
)

const InstaImages = () => (
  <div id="sbi_images">
    <InstaImage style={{ gridColumn: 1, gridRow: 1 }} imgLink={'https://scontent.cdninstagram.com/vp/adab2097d315b0231874874d22fe1c79/5E22BF36/t51.2885-15/e35/s320x320/51880722_547241645759490_4445104620470738808_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 2, gridRow: 1 }} imgLink={'https://scontent.cdninstagram.com/vp/0fb42d576bdb91f3f07ff7ec9c4b1835/5E37EAE8/t51.2885-15/e35/p320x320/50909192_257831831781164_4960194446628595626_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 3, gridRow: 1 }} imgLink={'https://scontent.cdninstagram.com/vp/5589c732d39f5924b3391bfce7ffdf6a/5E37B97F/t51.2885-15/e35/s320x320/49492353_304458466870020_6723443648692197093_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 4, gridRow: 1 }} imgLink={'https://scontent.cdninstagram.com/vp/a6690212a41518f6045d4d3aea3d5e80/5E26ABDE/t51.2885-15/e35/s320x320/45857476_210907723154448_6156869855291699135_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 5, gridRow: 1 }} imgLink={'https://scontent.cdninstagram.com/vp/5c867f6ef09b2b50373d078b5be453fb/5E2FDCE9/t51.2885-15/e35/p320x320/49380789_370482100180577_628094579137821647_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 6, gridRow: 1 }} imgLink={'https://scontent.cdninstagram.com/vp/f03bf0fb75fc0763fc87b2cd86bd2db4/5E1C7511/t51.2885-15/e35/s320x320/47690203_782902575395131_888321466823278747_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 7, gridRow: 1 }} imgLink={'https://scontent.cdninstagram.com/vp/224ea372a69281b58a8afd30d80ee480/5E1E4EF0/t51.2885-15/e35/s320x320/47690527_330066334494247_6733645215720013800_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 1, gridRow: 2 }} imgLink={'https://scontent.cdninstagram.com/vp/c3a12509efff6b2471099cb1b0460b79/5E37B85B/t51.2885-15/e35/p320x320/46911439_1164307900405137_6137647825726054042_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 2, gridRow: 2 }} imgLink={'https://scontent.cdninstagram.com/vp/2f41412346364bf745ca012d5be89ff5/5E334368/t51.2885-15/e35/s320x320/46647879_385396728863426_1980037455888903992_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 3, gridRow: 2 }} imgLink={'https://scontent.cdninstagram.com/vp/71fb2b4cefad75b68335a115c61649b5/5E326E8F/t51.2885-15/e35/p320x320/47163228_306281893429060_6690633157207529460_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 4, gridRow: 2 }} imgLink={'https://scontent.cdninstagram.com/vp/446c26c8ba2b999a993fe670121bf13d/5E201EA5/t51.2885-15/e35/s320x320/45865107_1979882968744501_4231680440095908899_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 5, gridRow: 2 }} imgLink={'https://scontent.cdninstagram.com/vp/bbeec62534e5acb0b0f3270c7a948fdb/5E3B2197/t51.2885-15/e35/s320x320/49339191_1994942460808272_5704553914134631578_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 6, gridRow: 2 }} imgLink={'https://scontent.cdninstagram.com/vp/d8f7a469684c9f63f50a253ce0577891/5E278CF0/t51.2885-15/e35/s320x320/44871210_1924791270970699_6005580241049818231_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
    <InstaImage style={{ gridColumn: 7, gridRow: 2 }} imgLink={'https://scontent.cdninstagram.com/vp/03fcb12727776ae3a2fa7f99e6f50209/5E397E10/t51.2885-15/e35/p320x320/44871200_273605613346999_4860924657108686408_n.jpg?_nc_ht=scontent.cdninstagram.com'} />
  </div>
)


const InstaFooter = ({ username }) => (
  <div id="sbi_load" className="" style={{ margin: "20px 0px 50px" }}>
    <span className="sbi_follow_btn"><a href={`https://www.instagram.com/${username}`} target="_blank" rel="noopener noreferrer"><svg className="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-fa-processed="" data-prefix="fab" data-icon="instagram" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>Follow on Instagram</a></span>
  </div>
)

const InstagramFeed = ({ username }) => (
  <div id="instagram-feed">
    <div id="sb_instagram" className="sbi sbi_mob_col_auto sbi_col_7 sbi_medium" style={{ width: "100%", paddingBottom: "6px" }} data-num="14" data-res="auto" data-cols="7" data-sbi-index="1">
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
