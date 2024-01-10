import {IUser} from "../types.ts";


export enum AuthReducerActionType {
    LOGIN_USER = "AUTH_LOGIN_USER"
}

export interface IAuthReducerState {
    isAuth: boolean,
    user: IUser | null
}

const initState: IAuthReducerState = {
    isAuth: false,
    user: null
}

const AuthReducer = (state = initState, action: any): IAuthReducerState => {
    switch (action.type) {
        case AuthReducerActionType.LOGIN_USER:
            return {
                isAuth: true,
                user: action.payload as IUser
            } as IAuthReducerState;

        default: {
            return state;
        }
    }
}

export default AuthReducer;