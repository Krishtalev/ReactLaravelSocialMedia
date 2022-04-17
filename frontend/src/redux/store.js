import dialogsReducer from "./reducers/dialogs-reducer";
import friendsReducer from "./reducers/friends-reducer";
import profileReducer from "./reducers/profile-reducer";
import barbieImg from "../Images/pngwing.png";

let store = {
	renderApp(){},

	state: {
		profilePage: {
			postData: [ 
				{
					id: 1, 
					text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, sequi?', 
					name: 'Andrey',
					likesCount: 2, likesFlag: true
				}, 
				{
					id: 2, 
					text: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore alias ex necessitatibus numquam ducimus consectetur porro nobis magni fuga quia.', 
					name: 'Alexey',
					likesCount: 22, likesFlag: true
				},
				{
					id: 3, 
					text: 'Hi', 
					name: 'Afanasiy',
					likesCount: 10, likesFlag: true
				},
			],

			newPostValue: '',
		},

		dialogPage: {
			dialogsData: [ 
				{id: 1, name: 'Andrey', src:barbieImg}, 
				{id: 2, name: 'Dmitry', src:barbieImg},
				{id: 3, name: 'Sasha', src:barbieImg},
				{id: 4, name: 'Sveta', src:barbieImg},
			],
			messageData: [ 
				{id: 1, message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, a?'}, 
				{id: 2, message: 'Lorem.'},
				{id: 3, message: 'Lorem ipsum dolor sit'},
				{id: 4, message: 'Lorem ipsum dolor sit amet'},
				{id: 5, message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo tenetur labore iusto, aut excepturi nulla?'},
			],

			newMessageValue: '',
		},

		friendPage : {
			friendData: [
				{
					ava: "https://sun9-49.userapi.com/impf/c846217/v846217419/ff59d/WVZgeZN50Cs.jpg?size=700x875&quality=96&sign=9311eb1789c92d31cdfbb0dee24b5018&type=album", 
					name: "Эдуард Кузьмин", education: "TSU"
				},
				{
					ava: "https://sun4-12.userapi.com/s/v1/ig2/N7vsQqBR4TybGu6CFBLIK0FOunnxoCeDvocQo04zaJShZYFaDmB0qw0bTeo4k5VkDGdWCq6C0ira6jAjQ1iPp6Ie.jpg?size=50x50&quality=95&crop=528,360,527,527&ava=1", 
					name: "Алекс Кардо", education: "ASU"
				},
				{
					ava: "https://sun4-11.userapi.com/s/v1/if1/huCAwKq4nOTqwIm7xu8e77KEZ5lcbbdYCjt_NiGvFw713dHL131o6MMRgCuxMoAjBteFh1ab.jpg?size=50x50&quality=96&crop=12,12,200,200&ava=1", 
					name: "Андрей Приходько", education: "Jdayu"
				},
				{
					ava: "https://sun4-10.userapi.com/s/v1/ig2/xFtJ1E9I2AHLZTbyBjO4shcLyVKJ98xQ7KTGQkByFJh9RvRZond_FI49eP_zLPEad51wi1ynPY84ewFiOW6PebLE.jpg?size=50x50&quality=95&crop=68,35,480,480&ava=1", 
					name: "Виниамин Витамин", education: "BSU"
				},
			],

		},

		sidebar: {},
	},
	getState(){
		return this.state;
	},

	subscribe(observer) {
		store.renderApp = observer;	//паттерн наблюдатель
	},

	dispatch(action){
		this.state.profilePage = profileReducer(this.state.profilePage, action)
		this.state.dialogPage = dialogsReducer(this.state.dialogPage, action)
		this.state.friendPage = friendsReducer(this.state.friendPage, action)

		this.renderApp();
	}
}

export default store;
