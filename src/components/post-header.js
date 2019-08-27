import { Link } from "gatsby"
import PropTypes from "prop-types"
import React, { Fragment } from "react"

const Categories = ({ categories }) => (
  <span>{categories.map((category, i) => {
    return (
      <Fragment>
        <Link to={`category/${category.slug}`} rel="category tag">{category.name}</Link>{i < (categories.length - 1) ? ', ' : ''}
      </Fragment>
    )
  })}</span>
)

const PostHeader = ({ node }) => (
  <div>
    <header class="entry-header">
      <div class="post-icon"><i class="icon icon-image"></i></div>
      <h3 class="post-title"><Link to={node.slug}>{node.title}</Link></h3>
    </header>

    <div class="entry-meta">
      <span>Written by <Link to={`author/${node.author.slug}/`}>{node.author.name}</Link></span>
      <span> / </span>
      <Categories categories={node.categories} />
      <span> / </span>
      <span>{node.date}</span>
    </div>

    <div class="thumbnail">
      <img src={node.featured_media.source_url} class="attachment-blog-image size-blog-image wp-post-image" alt="" scale="0" height={node.featured_media.media_details.height} />
    </div>
  </div>
)

PostHeader.propTypes = {
  node: PropTypes.object,
}

PostHeader.defaultProps = {
  node: {},
}

export default PostHeader
