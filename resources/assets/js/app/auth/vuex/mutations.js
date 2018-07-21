import localforage from "localforage";
import { isEmpty } from "lodash";

export const setToken = (state, token) => {
  if (isEmpty(token)) {
    localforage.removeItem("authtoken");
    return;
  }

  localforage.setItem("authtoken", token);
};

export const setAuthenticated = (state, trueOrFalse) => {
  state.user.authenticated = trueOrFalse;
};

export const setUserData = (state, userData) => {
  state.user.data = userData;
};
