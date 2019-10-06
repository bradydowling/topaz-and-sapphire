import { Link } from "gatsby"
import PropTypes from "prop-types"
import React from "react"
import Categories from "./categories"

const PostMeta = ({ node }) => {
  const postDate = new Date(Date.parse(node.date));
  const displayDate = `${postDate.toLocaleString('default', { month: 'long' })} ${postDate.getDate()}, ${postDate.getFullYear()}`;
  return (
    <div class="entry-meta">
      <span>Written by <Link to={`author/${node.author.slug}/`}>{node.author.name}</Link></span>
      <span> / </span>
      <Categories categories={node.categories} />
      <span> / </span>
      <span>{displayDate}</span>
    </div>
  )
};

PostMeta.propTypes = {
  node: PropTypes.object,
}

PostMeta.defaultProps = {
  node: {},
}

export default PostMeta;