import ReactDOM from 'react-dom/client'
import App from './App.tsx'
import './index.css'
import {BrowserRouter} from "react-router-dom";
import {Provider} from "react-redux";
import {store} from "./store";
import {jwtDecode} from "jwt-decode";
import {IUser} from "./components/auth/types.ts";
import {AuthReducerActionType} from "./components/auth/login/AuthReducer.ts";

if(localStorage.token) {
    const user = jwtDecode(localStorage.token) as IUser;
    store.dispatch({
        type: AuthReducerActionType.LOGIN_USER,
        payload: {
            email: user.email,
            image: user.image
        } as IUser
    });
}

ReactDOM.createRoot(document.getElementById('root')!).render(
    <Provider store={store}>
        <BrowserRouter>
            <App/>
        </BrowserRouter>
    </Provider>,
)
