import { Link } from "gatsby"
import PropTypes from "prop-types"
import React from "react"

const Categories = ({ categories }) => (
  <span>{categories.map((category, i) => {
    return (
      <>
        <Link to={`category/${category.slug}`} rel="category tag">{category.name}</Link>{i < categories.length - 1 ? ', ' : ''}
      </>
    )
  })}</span>
)

Categories.propTypes = {
  categories: PropTypes.array,
}

Categories.defaultProps = {
  categories: [],
}

export default Categories