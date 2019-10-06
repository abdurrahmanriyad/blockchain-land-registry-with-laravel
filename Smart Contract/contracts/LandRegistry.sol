pragma solidity ^0.5.0;

contract LandRegistry {
  uint public totalRegistered = 0;
  struct Township {
    uint id;
    uint townshipId;
    uint owner_nid;
    string owner_name;
    string owner_address;
    string owner_father_name;
    string owner_mother_name;
  }

  mapping(uint => Township) public townShips;

  constructor() public {
      
  }

  function registerTownShip(
    uint townshipId,
    uint owner_nid,
    string memory owner_name,
    string memory owner_address,
    string memory owner_father_name,
    string memory owner_mother_name
  ) public {
    totalRegistered++;
    townShips[totalRegistered] = Township(
      totalRegistered,
      townshipId,
      owner_nid,
      owner_name,
      owner_address,
      owner_father_name,
      owner_mother_name
    );
  }
}