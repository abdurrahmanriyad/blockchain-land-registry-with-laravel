App = {
  contracts: {},
  load: async () => {
    await App.loadWeb3()
    await App.loadAccount()
    await App.loadContract()
    await App.render()
  },

  loadWeb3: async () => {
    if (typeof web3 !== 'undefined') {
      App.web3Provider = web3.currentProvider
      web3 = new Web3(web3.currentProvider)
    } else {
      window.alert("Please connect to Metamask.")
    }
    // Modern dapp browsers...
    if (window.ethereum) {
      window.web3 = new Web3(ethereum)
      try {
        // Request account access if needed
        await ethereum.enable()
        // Acccounts now exposed
        web3.eth.sendTransaction({/* ... */})
      } catch (error) {
        // User denied account access...
      }
    }
    // Legacy dapp browsers...
    else if (window.web3) {
      App.web3Provider = web3.currentProvider
      window.web3 = new Web3(web3.currentProvider)
      // Acccounts always exposed
      web3.eth.sendTransaction({/* ... */})
    }
    // Non-dapp browsers...
    else {
      console.log('Non-Ethereum browser detected. You should consider trying MetaMask!')
    }
  },

  loadAccount: async () => {
    // Set the current blockchain account
    App.account = web3.eth.accounts[0]
    console.log('accounts', web3.eth.accounts);
  },

  loadContract: async () => {
    // Create a JavaScript version of the smart contract
    const landRegistry = await $.getJSON('LandRegistry.json')
    App.contracts.LandRegistry = TruffleContract(landRegistry)
    App.contracts.LandRegistry.setProvider(App.web3Provider)

    // Hydrate the smart contract with values from the blockchain
    App.landRegistry = await App.contracts.LandRegistry.deployed()
  },

  render: async () => {
    // Render Account
    // $('body').html(App.account)

    // Render Tasks
    await App.renderTasks()
  },

  renderTasks: async () => {
    const totalRegistered = await App.landRegistry.totalRegistered()
    const townShipTemplate = $('#townships')

    for (var i = 1; i <= totalRegistered; i++) {
      // Fetch the task data from the blockchain
      const townShip = await App.landRegistry.townShips(i)
      let townshipId = await townShip[1].toNumber();
      let owner_name = await townShip[3];
      let owner_address = await townShip[4];
      let owner_father_name = await townShip[5];
      let owner_mother_name = await townShip[6];

      // Create the html for the task
      let townShipItem = `<div class="col-3">
      <div class="card">
      <h5 class="card-header">`+ owner_name +`</h5>
      <div class="card-body">
        <h5 class="card-title">`+ townshipId +`</h5>
      </div>
    </div></div>`;

      // Show the task
      townShipTemplate.append(townShipItem)
    }
  },

  registerLand: async (data) => {
    let townshipId = $('[name="townshipId"]').val();
    let owner_nid = $('[name="owner_nid"]').val();
    let owner_name = $('[name="owner_name"]').val();
    let owner_address = $('[name="owner_address"]').val();
    let owner_father_name = $('[name="owner_father_name"]').val();
    let owner_mother_name = $('[name="owner_mother_name"]').val();

    console.log(Number(townshipId), Number(owner_nid), owner_name, owner_address, owner_father_name, owner_mother_name);
    
    // await App.landRegistry.registerTownShip(Number(townshipId), Number(owner_nid), owner_name, owner_address, owner_father_name, owner_mother_name)
    await App.landRegistry.registerTownShip(12, 1131313313, 'Abdur Rahman', 'Senpara Porbota', 'Nurul Huda', 'Rokeya begum');
    alert('Successfully registered the land.')
  },
}


$(() => {
  $(window).load(() => {
    App.load()
  })
})