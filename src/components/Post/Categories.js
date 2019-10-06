import { Link } from "gatsby"
import PropTypes from "prop-types"
import React, { Fragment } from "react"

const Categories = ({ categories }) => (
  <span>{categories.map((category, i) => {
    return (
      <Fragment key={i}>
        <Link to={`category/${category.slug}`} rel="category tag">{category.name}</Link>{i < categories.length - 1 ? ', ' : ''}
      </Fragment>
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