import {getLocalUser} from "../../services/helpers/auth";

const user = getLocalUser();

const state = {
  currentUser: user,
  isLoggedIn: !!user,
  auth_error: null,
  store_error: null,
  store_success: null,
  get_error: null,
  agents: [],
  agentsTrash: [],
  clientsTrash: [],
  agentsCount: 0,
  agentsCountForThisMonth: 0,
  clientsCount: 0,
  clientsCountForThisMonth: 0,
  mainsCountForThisMonth: 0,
  mainsCount: 0,
  mainsCountTrash: 0,
  planningsTrashCount: 0,
  mainsTrash: [],
  planningsCount: 0,
  plannings: [],
  planningsTrash: [],
  planningsCountForThisMonth: 0,
  qualifications: [],
  consigneDay: [],
  roles: [],
  messages: [],
  contacts: [],
  selectedContact: null,
  currentMains: [],
  listSumPlannings: [],
  currentPlannings: [],
  clients: [],
  onlineUsers: [],
  mains: [],
  listDescriptionMain: [],
  notifications: [],
  markers: [],
  unreadMessages: 0,
  contactMessagesCount: 0,
  contactMessages: [],
  planningWithMain: {},
    isCollapse: false
};

export default state;