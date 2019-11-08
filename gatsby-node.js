const path = require(`path`)
exports.createPages = async ({ graphql, actions }) => {
  const { createPage } = actions
  const postsData = await graphql(`
    {
      allWordpressPost(sort: { fields: [date] }) {
        edges {
          node {
            title
            excerpt
            content
            slug
          }
        }
      }
    }
  `);

  postsData.data.allWordpressPost.edges.forEach(({ node }) => {
    createPage({
      path: node.slug,
      component: path.resolve(`./src/templates/blog-post.js`),
      context: {
        // This is the $slug variable
        // passed to blog-post.js
        slug: node.slug,
      },
    })
  });

  const categoriesData = await graphql(`
  {
    allWordpressPost(sort: { fields: [date] }) {
      edges {
        node {
          title
          excerpt
          content
          slug
        }
      }
    }
  }
`);

  categoriesData.data.allWordpressPost.edges.forEach(({ node }) => {
    createPage({
      path: node.slug,
      component: path.resolve(`./src/templates/category.js`),
      context: {
        slug: node.slug,
      },
    })
  });
}