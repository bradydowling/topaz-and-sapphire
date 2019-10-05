import { Link } from "gatsby"
import PropTypes from "prop-types"
import React from "react"
import Categories from "./Post/Categories"

const PostMeta = ({ node }) => (
  <div class="entry-meta">
    <span>Written by <Link to={`author/${node.author.slug}/`}>{node.author.name}</Link></span>
    <span> / </span>
    <Categories categories={node.categories} />
    <span> / </span>
    <span>{node.date}</span>
  </div>
)

const PostHeader = ({ node }) => (
  <article id="post-1510" class="gallery post-detail blog-post hentry post-1510 post type-post status-publish format-gallery has-post-thumbnail category-abode category-career tag-career tag-home-office tag-office-spaces tag-study tag-women-who-work tag-work post_format-post-format-gallery">
    <header class="entry-header">
      <div class="post-icon"><i class="icon icon-image"></i></div>
      <h3 class="post-title"><Link to={node.slug}>{node.title}</Link></h3>
    </header>

    <PostMeta node={node} />

    <div class="thumbnail">
      <img src={node.featured_media.source_url} class="attachment-blog-image size-blog-image wp-post-image" alt="" scale="0" height={node.featured_media.media_details.height} />
    </div>
  </article>
)

PostHeader.propTypes = {
  node: PropTypes.object,
}

PostHeader.defaultProps = {
  node: {},
}

export default PostHeader
