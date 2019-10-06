var LandRegistry = artifacts.require("./LandRegistry.sol");

module.exports = function(deployer) {
  deployer.deploy(LandRegistry);
};