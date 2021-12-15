module.exports = (sequelize, Sequelize) => {
  const Budgeting = sequelize.define("budgeting", {
    balance: {
      type: Sequelize.STRING,
    },
    type: {
      type: Sequelize.STRING,
    },
    description: {
      type: Sequelize.STRING,
    },
    published: {
      type: Sequelize.BOOLEAN,
    },
  });

  return Budgeting;
};
