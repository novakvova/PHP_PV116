import {IUploadedFile} from "../../interfaces/forms";

export interface IRegisterForm {
    lastName: string,
    name: string,
    phone: string,
    email: string,
    password: string,
    password_confirmation: string,
    image: IUploadedFile|null
}

export interface IRegister {
    lastName: string,
    name: string,
    phone: string,
    email: string,
    password: string,
    password_confirmation: string,
    image: string | undefined
}

export interface ILogin {
    email: string,
    password: string
}

export interface ILoginResult {
    token: string
}

export interface IUser {
    email: string,
    image: string
}